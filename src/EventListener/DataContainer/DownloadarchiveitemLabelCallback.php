<?php

declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\EventListener\DataContainer;

use Contao\DataContainer;
use Contao\FilesModel;
use Contao\StringUtil;
/* obsolete as the backend view is rendered now by DownloadarchiveitemsChildRecordCallback.php! */
class DownloadarchiveitemLabelCallback
{
    public function __invoke(array $row, string $label, DataContainer $dc, array $args = []): string
    {  


        return sprintf('id %s -  %s ', $row['id'] ?? '', $row['title']);
    }
}
