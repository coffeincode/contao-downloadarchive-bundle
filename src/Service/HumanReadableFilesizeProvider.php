<?php
declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\Service;

use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveModel;
use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveitemModel;
use Contao\ContentModel;
use Contao\CoreBundle\File\Metadata;


class HumanReadableFilesizeProvider
{
    public function __construct(){}

    public function getHumanReadableFilesize(string $bytes, $decimals = 2) : string
    {
        $factor = floor((strlen($bytes) - 1) / 3);
        if ($factor > 0) $sz = 'KMGT';
        return str_replace(".", ",", sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor - 1] . 'B');
    }
}