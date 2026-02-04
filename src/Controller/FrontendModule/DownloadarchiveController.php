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
use Contao\Input;
use Contao\Pagination;
use Contao\Config;
use Contao\CoreBundle\Exception\PageNotFoundException;
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
            $archiveIds= StringUtil::deserialize($model->downloadarchive);

            $archives = [];
            foreach ($archiveIds as $archiveId) {
                $archives[] = DownloadarchiveModel::findPublishedById($archiveId);
            }


        }

        if ($archives !== null) {


            //$collection = DownloadarchiveitemModel::findBy('pid', $archive->id, ['order' => $model->downloadSorting]);
            $arrOptions = [];

            if ($model->downloadNumberOfItems!=0) {
                $arrOptions = ['order' => $model->downloadSorting, 'limit'=> $model->downloadNumberOfItems];
            }else {
                $arrOptions = ['order' => $model->downloadSorting];
            }
            $perPage = (int) $model->perPage;
            if ($perPage > 0) {
                $total = $model->downloadNumberOfItems!=0 ? $model->downloadNumberOfItems : DownloadarchiveitemModel::countByPids($archiveIds);
                $param = 'page_n'.$model->id;
                $page = (int) (Input::get($param) ?? 1);

                if ($page < 1 || $page > max(ceil($total / $perPage), 1)) {
                    throw new PageNotFoundException('Page not found: '.Environment::get('uri'));
                }else if ($page == intval(ceil($total / $perPage)) ){
                    //in this case only total  % perpage is left to display as we are on the last page
                    $arrOptions['limit'] = $total%$perPage;
                }
                else $arrOptions['limit'] = $perPage;

                $offset = ($page - 1) * $perPage;

                $arrOptions['offset'] = $offset;


                $pagination = new Pagination($total, $perPage, Config::get('maxPaginationLinks'), $param);
                $template->set('pagination', $pagination->generate("\n  "));
            }
            else  $template->set('pagination', "");


            $collection = DownloadarchiveitemModel::findByPids( $archiveIds, $arrOptions);

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

                    $fileModel = FilesModel::findByUuid($item->singleSRC);
                    $filePath = $fileModel?->path;
                    $downloadHref = null;
                    if ($filePath) {
                        $href = Environment::get('base') . '/' . $filePath;
                    }


                    //  get metadata from file
                    $filesize = $this->human_filesize(strval(filesize($filePath)), 2);



                    $items[] = [
                        'id' => $item->id,
                        'title' => $item->title,
                        'description' => $item->description,
                        'singleSRC' => $item->singleSRC,
                        'filePath' => $filePath,
                        'filesize' => $filesize,
                        'fileDate' => $item->tstamp,
                        'downloadHref' => $downloadHref,
                        'href' => $href,
                        'addImage' => (bool)$item->addImage,
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

        $template->set('title', $model->title);
        //old:
       // $this->Template->showMeta = $this->downloadShowMeta ? true : false;
       // $this->Template->hideDate = $this->downloadHideDate ? true : false;
        $template->set('showMeta',$model->downloadShowMeta ? true : false);
        $template->set('hideDate',$model->downloadHideDate ? true : false);
        $template->set('items', $items);

        return $template->getResponse();
    }

    private function human_filesize(string $bytes, $decimals = 2) {
        $factor = floor((strlen($bytes) - 1) / 3);
        if ($factor > 0) $sz = 'KMGT';
        return str_replace(".", "," ,sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor - 1] . 'B');
    }
}
