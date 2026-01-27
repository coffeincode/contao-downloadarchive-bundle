<?php

declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\Controller\FrontendModule;

use Coffeincode\ContaoDownloadarchiveBundle\Model\DummyArchiveModel;
use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveitemModel;
use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\ModuleModel;
use Contao\StringUtil;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsFrontendModule(type: 'downloadarchive_list', category: 'downloadarchive', template: 'frontend_module/downloadarchive_list')]
class DownloadarchiveController extends AbstractFrontendModuleController
{
    protected function getResponse(FragmentTemplate $template, ModuleModel $model, Request $request): Response
    {
        $archive = null;
        $items = [];

        if ($model->dummy_archive) {
            $archive = DummyArchiveModel::findById($model->dummy_archive);
        }

        if ($archive !== null) {
            $collection = DownloadarchiveitemModel::findBy('pid', $archive->id, ['order' => 'dummy_item_name']);

            if ($collection !== null) {
                foreach ($collection as $item) {
                    $headlineData = StringUtil::deserialize($item->headline, true);
                    $headline = (string) ($headlineData['value'] ?? $headlineData[0] ?? '');

                    $items[] = [
                        'id' => $item->id,
                        'name' => $item->title,
                        'headline' => $headline !== '' ? $headline : $item->description,
                    ];
                }
            }
        }

        $template->set('archive', $archive);
        $template->set('items', $items);

        return $template->getResponse();
    }
}
