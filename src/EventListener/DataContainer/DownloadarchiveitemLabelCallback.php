<?php

declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\EventListener\DataContainer;

use Contao\DataContainer;
use Contao\FilesModel;
use Contao\StringUtil;

class DownloadarchiveitemLabelCallback
{
    public function __invoke(array $row, string $label, DataContainer $dc, array $args = []): string
    {  


        return sprintf('id %s -  %s <br><p> %s </p>', $row['id'] ?? '', $row['title'], FilesModel::findByUuid($row['singleSRC'])->path);
    }
}
