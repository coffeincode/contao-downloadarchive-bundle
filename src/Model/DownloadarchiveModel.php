<?php

declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\Model;

use Contao\Config;
use Contao\Date;
use Contao\Model;

//this model extends the default model to respect published, start and stop records of the archive

class DownloadarchiveModel extends Model
{
    protected static $strTable = 'tl_downloadarchive';

    public static function findOneByTitle($title)
    {
        return static::findOneBy(['title' => $title]);
    }
    public static function findPublishedById($id, array $options = []){
        //if (Config::get('showUnpublishedRecords') === true) {
        if (static::isPreviewMode($options)) {
            return static::findById($id);
        }
        $t = static::$strTable;

        $time = Date::floorToMinute();
        $conditions = ["$t.id=?",
                        "$t.published=?",
                        "($t.start<=? OR $t.start='')",
                        "($t.stop>=? OR $t.stop='')"
                        ];
        $values = [$id, 1, $time,$time];
        return static::findOneBy($conditions, $values);

        //old version without check for start/stop:
        //return static::findOneBy(['id=?', 'published=?'],[$id,1]);


    }

    public static function findAllPublished()
    {
        if (Config::get('showUnpublishedRecords') === true) {
            return static::findAll();
        }
        return static::findBy(['published' => 1], ['order' => 'title']);
    }

}
