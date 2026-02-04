<?php


declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\Controller\ContentElement;

use Coffeincode\ContaoDownloadarchiveBundle\Service\DownloadarchiveFrontendProvider;
use Coffeincode\ContaoDownloadarchiveBundle\Service\HumanReadableFilesizeProvider;
use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveModel;
use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveitemModel;
use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\File\Metadata;
use Contao\CoreBundle\Image\Studio\Studio;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\FilesModel;
use Contao\Environment;
use Contao\ModuleModel;
use Contao\StringUtil;
use Contao\System;
use Contao\Input;
use Contao\Pagination;
use Contao\Config;
use Contao\CoreBundle\Exception\PageNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(type: 'downloadarchive', category: 'downloadarchive', template: 'content_element/content_downloadarchive')]
class DownloadarchiveContentController extends AbstractContentElementController
{
    public function __construct( private readonly DownloadarchiveFrontendProvider $downloadarchiveFrontendProvider){
    }
    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        $archive = null;
        $items = [];
        $fileModel = null;
        $filePath = null;
        $archiveIds = null;


        if ($model->downloadarchive) {
            $archiveIds = StringUtil::deserialize($model->downloadarchive);

        }
        $result = $this->downloadarchiveFrontendProvider->getItemsForTemplate($model->id,$archiveIds,$model->downloadSorting,$model->downloadNumberOfItems,(int)$model->perPage);
        $items = $result[0];
        $pagination = $result[1];

        if (sizeof($items)!=0) {
            if ((int)$model->perPage > 0) {
                $template->set('pagination', $pagination->generate("\n  "));
            } else {
                $template->set('pagination', "");
            }
        }else {
            $template->set('pagination', "");
        }


        $template->set('showMeta', $model->downloadShowMeta ? true : false);
        $template->set('hideDate', $model->downloadHideDate ? true : false);
        $template->set('items', $items);


        return $template->getResponse();

    }


}
