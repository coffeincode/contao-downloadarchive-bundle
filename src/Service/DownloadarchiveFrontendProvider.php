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
use Contao\CoreBundle\Security\ContaoCorePermissions;
use Symfony\Bundle\SecurityBundle\Security;

class DownloadarchiveFrontendProvider{
    public function __construct(private readonly HumanReadableFilesizeProvider $humanReadableFilesizeProvider, private readonly Security $security){

    }
    public function getItemsForTemplate(int $modelId, array $archiveIds,string $downloadSorting, int $downloadNumberOfItems, int $perPage): array
    {
        $items = [];
        if (count($archiveIds)!=0) {
            $archives = [];
            foreach ($archiveIds as $archiveId) {

                $tmpModel= DownloadarchiveModel::findPublishedById($archiveId);
                if ($tmpModel !== null) {
                    $archives[] =$tmpModel->id;
                }
            }
        }


        if ($archives[0] !== null) {

            $arrOptions = [];

            if ($downloadNumberOfItems != 0) {
                $arrOptions = ['order' => $downloadSorting, 'limit' => $downloadNumberOfItems];
            } else {
                $arrOptions = ['order' => $downloadSorting];
            }

            $maxAmount = DownloadarchiveitemModel::countPublishedByPids($archives);

            if ($perPage > 0 && $perPage<$maxAmount) {

                $total = $downloadNumberOfItems != 0 ? $downloadNumberOfItems : $maxAmount;
                if ($total > $maxAmount) {
                    $total = $maxAmount;
                }

                $param = 'page_n' . $modelId;
                $page = (int)(Input::get($param) ?? 1);

                if ($page < 1 || $page > max(ceil($total / $perPage), 1)) {
                    throw new PageNotFoundException('Page not found: ' . Environment::get('uri'));
                } else if ($page == intval(ceil($total / $perPage))) {
                    //in this case only total  % perpage is left to display as we are on the last page
                    $arrOptions['limit'] = $total % $perPage;
                } else {
                    $arrOptions['limit'] = $perPage;
                }

                $offset = ($page - 1) * $perPage;
                $arrOptions['offset'] = $offset;
                $pagination = new Pagination($total, $perPage, Config::get('maxPaginationLinks'), $param);
                /// leave the addition to the template in the controller, here only the object is created!
                /// $template->set('pagination', $pagination->generate("\n  "));
            }
            else  $pagination = new Pagination(0,0, Config::get('maxPaginationLinks'),"1");

            $collection = DownloadarchiveitemModel::findPublishedByPids($archives, $arrOptions);

            if ($collection !== null) {

                //todo: change to dependency injection
                /** @var Studio $studio */
                $studio = System::getContainer()->get('contao.image.studio');

                foreach ($collection as $item) {

                    if ($item->protected){
                        $groups = StringUtil::deserialize($item->groups, true);
                        if(! $this->security->isGranted(ContaoCorePermissions::MEMBER_IN_GROUPS, $groups)){

                            continue;
                        }
                    }
                    if ($item->guests && $this->security->getUser()) {
                        continue;
                    }


                    $figure = null;
                    $fileModel = FilesModel::findByUuid($item->singleSRC);
                    $filePath = $fileModel?->path;
                    $downloadHref = null;
                    if ($filePath) {
                        $href = Environment::get('base') . '/' . $filePath;
                    }

                    if ($item->addImage) {
                       //create figure and decide wether to use lightbox or not
                        $figure=$studio->createFigureBuilder()
                            ->from($item->imgSRC)
                            ->setSize($item->size)
                            ->enableLightbox($item->useImage==1?true:false)
                            ->setLinkHref($item->useImage==2?$href:null)
                            ->setMetadata(new Metadata([
                                Metadata::VALUE_ALT => $item->alt,
                                Metadata::VALUE_CAPTION => $item->caption,
                            ]))
                            ->buildIfResourceExists();
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
           //die();
        }else
        {
            return [[], []];
        }
        return [$items,$pagination];
    }
}