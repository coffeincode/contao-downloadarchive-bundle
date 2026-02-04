<?php

declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\Service;

use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveModel;
use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveitemModel;
use Contao\Config;
use Contao\ContentModel;
use Contao\CoreBundle\Exception\PageNotFoundException;
use Contao\CoreBundle\File\Metadata;
use Contao\CoreBundle\Image\Studio\Studio;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\Environment;
use Contao\FilesModel;
use Contao\Input;
use Contao\Pagination;
use Contao\StringUtil;
use Contao\System;

class DownloadarchiveFrontendProvider{
    public function __construct(private readonly HumanReadableFilesizeProvider $humanReadableFilesizeProvider){

    }
    public function getItemsForTemplate(int $modelId, array $archiveIds,string $downloadSorting, int $downloadNumberOfItems, int $perPage): array
    {
        if (count($archiveIds)!=0) {


            $archives = [];
            foreach ($archiveIds as $archiveId) {
                $archives[] = DownloadarchiveModel::findPublishedById($archiveId);
            }


        }


        if ($archives !== null) {



            $arrOptions = [];

            if ($downloadNumberOfItems != 0) {
                $arrOptions = ['order' => $downloadSorting, 'limit' => $downloadNumberOfItems];
            } else {
                $arrOptions = ['order' => $downloadSorting];
            }


            if ($perPage > 0) {
                $total = $downloadNumberOfItems!=0 ? $downloadNumberOfItems : DownloadarchiveitemModel::countByPids($archiveIds);
                $param = 'page_n'.$modelId;
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
                /// im Controller belassen! Hier nur erzeugen
                /// $template->set('pagination', $pagination->generate("\n  "));

            }
            else  $pagination = new Pagination(0,0, Config::get('maxPaginationLinks'),"1");



            $collection = DownloadarchiveitemModel::findByPids($archiveIds, $arrOptions);

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


                    // get metadata from file
                    $filesize = $this->humanReadableFilesizeProvider->getHumanReadableFilesize(strval(filesize($filePath)), 2);


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


        return [$items,$pagination];
    }
}