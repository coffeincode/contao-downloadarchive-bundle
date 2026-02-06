<?php

declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\Model;

use Contao\Config;
use Contao\Date;
use Contao\Model;


class DownloadarchiveitemModel extends Model
{
    protected static $strTable = 'tl_downloadarchiveitems';

    public static function findByPids(array $pids, array $options = [])
    {
        if (empty($pids)) {
            return null;
        }
        $t = static::$strTable;
        $columns = ["$t.pid IN (" . implode(',', array_map('intval',$pids)) . ")"];
        return static::findBy($columns,null, $options);
    }
    public static function findPublishedByPids(array $pids, array $options = [])
    {
        if (empty($pids)) {
            return null;
        }

        if (static::isPreviewMode($options)) {
            return static::findByPids($pids, $options);
        }

        $t = static::$strTable;
        $time = Date::floorToMinute();
        $columns = ["$t.pid IN (" . implode(',', array_map('intval',$pids)) . ")",
            "$t.published=1",
            "($t.start<=? OR $t.start= ''  )",
            "($t.stop>=? OR $t.stop= '' )"
        ];


        $values = [$time,$time];

        return static::findBy($columns,$values, $options);
    }

    public static function countPublishedByPids(array $pids, array $options = [])
    {
        if (empty($pids)) {
            return null;
        }
        $t = static::$strTable;
        $columns = ["$t.pid IN (" . implode(',', array_map('intval',$pids)) . ")","$t.published=1"];
        return count(static::findBy($columns,null, $options));
    }
}

