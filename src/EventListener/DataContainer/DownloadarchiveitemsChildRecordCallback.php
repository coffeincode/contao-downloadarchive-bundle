<?php

declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\EventListener\DataContainer;

use Contao\DataContainer;
use Contao\FilesModel;
use Contao\StringUtil;
use Contao\Image;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;use function Symfony\Component\String\u;

#[AsCallback(table: 'tl_downloadarchiveitems', target: 'list.sorting.child_record')]
class DownloadarchiveitemsChildRecordCallback
{

    public function __invoke(array $row): string
    {
        $imgCode ='';
        if($row['imgSRC']!=''){
            $file=FilesModel::findByUuid($row['imgSRC']);
            $thumb= $file ? Image::getHtml($file->path, '', 'style="max-width:80px;max-height:60px"') : '';
            $imgCode='<div><p><strong>Bildvorscchau</strong><br>'.$thumb.'</br></p></div>';
        }
        $code = '<div  class="cte_type"><strong>'.$row['title'].'</strong></div> 
                        <div  class="cte_preview"> 
                            <p><strong>Datei</strong><br>'.FilesModel::findByUuid($row['singleSRC'])->path.'</p>
                            <p><strong>Beschreibung</strong><br>'.$row['description'].'</p>
                            '.$imgCode.'                        
                        </div>';

        //return sprintf('<div  class="cte_type">ich bin das neue label!</div> <div  class="cte_preview"> Hallo Welt! <br> id %s -  %s <br></div>', $row['id'] ?? '', $row['title']);
        return $code;
    }
}
