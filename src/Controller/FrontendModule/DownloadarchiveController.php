<?php

declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\Controller\FrontendModule;

use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveModel;
use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveitemModel;
use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\CoreBundle\File\Metadata;
use Contao\CoreBundle\Image\Studio\Studio;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\FilesModel;
use Contao\Environment;;
use Contao\ModuleModel;
use Contao\StringUtil;
use Contao\System;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsFrontendModule(type: 'downloadarchive', category: 'downloadarchive', template: 'frontend_module/downloadarchive_list')]
class DownloadarchiveController extends AbstractFrontendModuleController
{
    protected function getResponse(FragmentTemplate $template, ModuleModel $model, Request $request): Response
    {
        $archive = null;
        $items = [];
        $fileModel = null;
        $filePath = null;

        if ($model->downloadarchive) {
            $archive = DownloadarchiveModel::findPublishedById($model->downloadarchive);
            //$archive = DownloadarchiveModel::find
        }

        if ($archive !== null) {

            $collection = DownloadarchiveitemModel::findBy('pid', $archive->id, ['order' => 'title']);

            if ($collection !== null) {



                //todo: change to dependency injection
                /** @var Studio $studio */
                $studio = System::getContainer()->get('contao.image.studio');

                foreach ($collection as $item) {
                    $figure = null;

                    if ($item->addImage) {
                        $figure = $studio
                            ->createFigureBuilder()
                            ->from($item->imgSRC)
                            ->setSize($item->size)
                            ->setMetadata(new Metadata([
                                Metadata::VALUE_ALT => $item->alt,
                                Metadata::VALUE_CAPTION => $item->caption,
                            ]))
                            ->buildIfResourceExists();
                    }

                    $fileModel= FilesModel::findByUuid($item->singleSRC);
                    $filePath = $fileModel?->path;
                    $downloadHref = null;
                    if ($filePath){
                        $href = Environment::get('base').'/'.$filePath;
                    }
                    $fileModel= FilesModel::findByUuid($item->singleSRC);
                    $filePath = $fileModel?->path;
                    $downloadHref = null;
                    if ($filePath){
                        //$href = Environment::get('base').'/'.$filePath;
                    }

                    $items[] = [
                        'id' => $item->id,
                        'title' => $item->title,
                        'description' => $item->description,
                        'singleSRC' => $item->singleSRC,
                        'filePath' => $filePath,
                        'downloadHref' => $downloadHref,
                        'href' => $href,
                        'addImage' => (bool) $item->addImage,
                        'imgSRC' => $item->imgSRC,
                        'useImage' => $item->useImage,
                        'alt' => $item->alt,
                        'caption' => $item->caption,
                        'size' => $item->size,
                        'floating' => $item->floating,
                        'figure' => $figure,
                        'floatClass' => ($item->floating === 'left' ? ' float_left' : ($item->floating === 'right' ? ' float_right' : '')),
                    ];
                }
            }
        }

        $template->set('archive', $archive);
        $template->set('items', $items);

        return $template->getResponse();
    }
}
