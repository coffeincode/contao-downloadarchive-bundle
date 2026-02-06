<?php

declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\Controller\FrontendModule;

use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveModel;
use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveitemModel;
use Coffeincode\ContaoDownloadarchiveBundle\Service\DownloadarchiveFrontendProvider;
use Coffeincode\ContaoDownloadarchiveBundle\Service\HumanReadableFilesizeProvider;
use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
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


// this causes problems and makes the template potentially non-customizable. Better without naming a template.
//#[AsFrontendModule(type: 'downloadarchive', category: 'downloadarchive', template: 'frontend_module/downloadarchive_list')]
#[AsFrontendModule(type: 'downloadarchive', category: 'downloadarchive',)]
class DownloadarchiveController extends AbstractFrontendModuleController
{
    public function __construct( private readonly DownloadarchiveFrontendProvider $downloadarchiveFrontendProvider){
    }
    protected function getResponse(FragmentTemplate $template, ModuleModel $model, Request $request): Response
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

        $template->set('title', $model->title);
        $template->set('showMeta', $model->downloadShowMeta ? true : false);
        $template->set('hideDate', $model->downloadHideDate ? true : false);
        $template->set('items', $items);


        return $template->getResponse();


    }


}
