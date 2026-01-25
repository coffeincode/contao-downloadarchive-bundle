<?php

declare(strict_types=1);
use Contao\ArrayUtil;
use Coffeincode\ContaoDownloadarchiveBundle\Model\DummyArchiveModel;
use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveitemModel;


// Insert the Dummy group between Content and Layout (design).

ArrayUtil::arrayInsert($GLOBALS['BE_MOD'], 1, [
    'downloadarchive' => [
        'downloadarchive' => [
            'tables' => ['tl_downloadarchive', 'tl_downloadarchiveitems'],
        ],
    ],
]);

$GLOBALS['TL_MODELS']['tl_downloadarchive'] = DownloadarchiveModel::class;
$GLOBALS['TL_MODELS']['tl_downloadarchiveitems'] = DownloadarchiveitemModel::class;
