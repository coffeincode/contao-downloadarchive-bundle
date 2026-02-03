<?php

declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\Model;

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

    public static function countByPids(array $pids, array $options = [])
    {
        if (empty($pids)) {
            return null;
        }
        $t = static::$strTable;
        $columns = ["$t.pid IN (" . implode(',', array_map('intval',$pids)) . ")"];
        return count(static::findBy($columns,null, $options));
    }
}

