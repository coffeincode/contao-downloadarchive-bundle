<?php

declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\EventListener\DataContainer;

use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveitemModel;
use Contao\CoreBundle\Monolog\ContaoContext;
use Contao\DataContainer;
use Contao\FilesModel;
use Contao\Model\Collection;
use Contao\StringUtil;
use Contao\Input;
use Doctrine\DBAL\Connection;
use Psr\Log\LoggerInterface;
use Contao\Folder;

class DownloadarchiveSaveCallback {

    private $db;
    //this is dependency-injected
    private LoggerInterface $logger;

    private int $filecounter;

    public function __construct(Connection $db, LoggerInterface $logger)
    {
        $this->db = $db;
         $this->logger = $logger;
         $this->filecounter = 0;
    }

    public function __invoke(DataContainer $dc): void{

        if (Input::post('FORM_SUBMIT') !== 'tl_downloadarchive') {
            return;
        }

        if (
            Input::post('save') === null &&
            Input::post('saveNclose') === null &&
            Input::post('saveNedit') === null &&
            Input::post('saveNback') === null &&
            Input::post('saveNcreate') === null &&
            Input::post('saveNduplicate') === null
        ) {
            // submitOnChange (palette reload) – skip
            return;
        }

        if (!$dc->id || $dc->activeRecord->loadDirectory === '') {
            //$this->logger->info('DownloadarchiveSaveCallback, nix zu ttun', ['contao' => new ContaoContext(__METHOD__, ContaoContext::GENERAL)]);
            return;
        }
        /*steps to read the directory:
         * 1. check if folder exists -> if not, return
         * 2. check if archive is empty -> if not, return
         * 3. check for filetypes allowed
         * 4. check if subfolders should  be read too
         * 5. check if a  prefix is set
         *
         * 6. collect files
         * 7. for each file:
         *      create a database-entry in tl_dlarchiveitems
         *
         *

        */

        //this delivers a set of filenames within the folder saved in dirSRC. Be careful, it also delivers foldernames witthin
        // $arrFiles = Folder::scan(FilesModel::findByUuid($dc->activeRecord->dirSRC)->path );
        // not useful...
        // also not useful:
        // $folderFileModel = FilesModel::findByUuid($dc->activeRecord->dirSRC);
        $arrObjItems = DownloadarchiveitemModel::findByPid($dc->id);
        if($arrObjItems ){
            return;
        }
        //findByPid expects a UUID of the parent folder! NOT the id in the Database! It delivers all files & folders within the folder!
        $arrObjFiles = FilesModel::findByPid($dc->activeRecord->dirSRC);

        $arrAllowedExtensions = explode(',',$dc->activeRecord->extension);
        if($arrAllowedExtensions[0]==='' && count($arrAllowedExtensions)===1){ $arrAllowedExtensions=[];}
        $prefix = $dc->activeRecord->prefix;
        $publishAll = $dc->activeRecord->publishAll==''?false:true;
        $classes = $dc->activeRecord->class;
        $this->createEntries($dc->id, $arrObjFiles, $arrAllowedExtensions, $dc->activeRecord->loadSubdir===''?false:true, $prefix,$publishAll ,$classes);


        //var_dump($arrFiles) ;
        //die();
        $this->logger->info('DownloadarchiveSaveCallback wurde aufgerufen', ['contao' => new ContaoContext(__METHOD__, ContaoContext::GENERAL)]);
        $this->logger->info('Downloadarchive id: '.$dc->id, ['contao' => new ContaoContext(__METHOD__, ContaoContext::GENERAL)]);
        //$this->logger->info('Downloadarchive Verzeichnis laden: '.$arrFiles[0], ['contao' => new ContaoContext(__METHOD__, ContaoContext::GENERAL)]);

    }

    private function createEntries(string $id, Collection $arrObjFiles, array $arrAllowedExtensions, bool $loadSubdirectories, string $prefix, bool $publishAll, string $class): void{

        $this->logger->info('DownloadarchiveSaveCallback : in arrObjFiles sind '.count($arrObjFiles)." Einträge.", ['contao' => new ContaoContext(__METHOD__, ContaoContext::GENERAL)]);
        for ($i=0; $i < count($arrObjFiles); $i++) {
            $this->logger->info('Schleifendurchgang: '.$i, ['contao' => new ContaoContext(__METHOD__, ContaoContext::GENERAL)]);
            $objFile = $arrObjFiles[$i];
            //var_dump($objFile);
            if ($objFile->type === 'folder') {
                //todo! call recursive function here!
                $this->logger->info('DownloadarchiveSaveCallback hat Folder gefunden, ggf Rekursion nötig: '.$objFile->path.$objFile->name, ['contao' => new ContaoContext(__METHOD__, ContaoContext::GENERAL)]);
                if ($loadSubdirectories) {
                    $newArrObjFiles = FilesModel::findByPid($objFile->uuid);
                    if ($newArrObjFiles)    {

                        $this->createEntries($id, $newArrObjFiles, $arrAllowedExtensions, $loadSubdirectories, $prefix, $publishAll, $class);}
                }
            }
            else if(count($arrAllowedExtensions)===0 || in_array($objFile->extension, $arrAllowedExtensions)){
                //insert as downloadarchiveitem
                $this->logger->info('DownloadarchiveSaveCallback hat Datei gefunden, einfügen: '.$objFile->name.'UUID: '.$objFile->uuid, ['contao' => new ContaoContext(__METHOD__, ContaoContext::GENERAL)]);
                $this->filecounter++;
                if($prefix!=''){
                    $tmpName = $prefix.$this->filecounter;
                }
                else{
                    $tmpName = $objFile->name;
                }
                $this->db->insert('tl_downloadarchiveitems', ['pid'=>$id,'sorting'=>$this->filecounter*32, 'title'=>$tmpName, 'singleSRC'=>$objFile->uuid, 'published'=>$publishAll]);
            }
        }
    }
}
