<?php

declare(strict_types=1);
use Contao\ArrayUtil;
use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveModel;
use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveitemModel;



/**
 * Backend modules
 */
$GLOBALS['BE_MOD']['content']['downloadarchive'] =
    [
        'tables' => ['tl_downloadarchive', 'tl_downloadarchiveitems'],

    ];


$GLOBALS['TL_MODELS']['tl_downloadarchive'] = DownloadarchiveModel::class;
$GLOBALS['TL_MODELS']['tl_downloadarchiveitems'] = DownloadarchiveitemModel::class;

$GLOBALS['TL_PERMISSIONS'][] = 'downloadarchivep';
$GLOBALS['TL_PERMISSIONS'][] = 'downloadarchives';