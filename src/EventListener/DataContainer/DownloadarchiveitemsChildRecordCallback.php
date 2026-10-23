<?php

declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\EventListener\DataContainer;

use Contao\DataContainer;
use Contao\FilesModel;
use Contao\StringUtil;
use Contao\Image;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use function Symfony\Component\String\u;

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
       $previewFile = FilesModel::findByUuid($row['singleSRC']);
        if ($previewFile!=null) $previewFilePath = $previewFile->path;
        else $previewFilePath='';

        $code = '<div  class="cte_type"><strong>'.$row['title'].'</strong></div> 
                        <div  class="cte_preview"> 
                            <p><strong>Datei</strong><br>'.$previewFilePath.'</p>
                            <p><strong>Beschreibung</strong><br>'.$row['description'].'</p>
                            '.$imgCode.'                        
                        </div>';
        return $code;
    }
}
