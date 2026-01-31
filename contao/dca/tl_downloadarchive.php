<?php


declare(strict_types=1);

use Contao\Config;
use Contao\System;
use Contao\DataContainer;
use Contao\DC_Table;
//TODO: necessary?!
//use PSpell\Config;

System::loadLanguageFile('tl_content');

$strtable = 'tl_downloadarchive';

$GLOBALS['TL_DCA'][$strtable] = [

    'config' => [
        'dataContainer' => DC_Table::class,
        'ctable' => ['tl_downloadarchiveitems'],
        'switchtoedit' => true,
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
            ],
        ],
    ],

    'list' => [
        'sorting' => [
            'mode' => DataContainer::MODE_SORTABLE,
            'fields' => ['title'],
            'flag' => 1,
            'panelLayout' => 'filter;sort,search,limit',
            'defaultSearchField' => 'title',
            //'disableGrouping' => true,
        ],
        'label' => [
            'fields' => ['title'],
            'format' => '%s',
        ]
    ],

    'palettes' => [
        '__selector__'   => ['loadDirectory'],
        'default' => '{title_legend},title,class;{directory_legend:hide},loadDirectory;{publish_legend},published,start,stop',
    ],
    'subpalettes' => ['loadDirectory' => 'dirSRC,loadSubdir,extension,prefix,publishAll'],

    'fields' => [

        'id' => [
            'search' => false, // no effect -> why?
            'sql' => "int(10) unsigned NOT NULL auto_increment",
        ],

        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default 0",
        ],
        'title' => [
            'search' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'loadDirectory' => [
            'label' => &$GLOBALS['TL_LANG']['tl_downloadarchive']['loadDirectory'],
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval'      => ['submitOnChange' => true],
            'sql' => "char(1) NOT NULL default ''",
        ],
        'loadSubdir' => [
            'label' => &$GLOBALS['TL_LANG']['tl_downloadarchive']['loadSubdir'],
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval'      => ['submitOnChange' => true],
            'sql' => "char(1) NOT NULL default ''"
        ],
        'dirSRC' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['dirSRC'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval' => ['files'=> false, 'fieldType' => 'radio', 'multiple' => false, 'tl_class' => 'w50'],
            'sql'                     => "binary(16) NULL"
        ],
        'prefix' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['prefix'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval' => [ 'maxlength' => 100, 'tl_class' => 'w50'],
            'sql'                     => "varchar(100) NOT NULL default ''"
        ],
        'extension' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['extension'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval' => [ 'maxlength' => 255, 'tl_class' => 'clr w50'],
            'sql'                     => "varchar(255) NOT NULL default ''"
        ],
        'publishAll' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['publishAll'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval' => ['tl_class' => 'clr m12'],
            'sql'                     => "char(1) NOT NULL default ''"
        ],
        'class' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['class'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => ['maxlength'=>255,'tl_class'=>'w50'],
            'sql'                     => "varchar(255) NOT NULL default ''"
        ],
        'published' => [
            'label' => &$GLOBALS['TL_LANG']['tl_content']['published'],
            'inputType' => 'checkbox',
            'filter' => true,
            'toggle' => true,
            //'eval' => ['tl_class' => 'w50'],
            'sql' => "char(1) NOT NULL default ''",
        ],
        'start' => [
            'label' => &$GLOBALS['TL_LANG']['tl_content']['start'],
            'inputType' => 'text',
            'eval' => ['rgxp' => 'datim', 'datepicker' => true, 'tl_class' => 'w50 wizard'],
            'sql' => "varchar(10) NOT NULL default ''"
        ],
        'stop' => [
            'label' => &$GLOBALS['TL_LANG']['tl_content']['stop'],
            'inputType' => 'text',
            'eval' => ['rgxp' => 'datim', 'datepicker' => true, 'tl_class' => 'w50 wizard'],
            'sql' => "varchar(10) NOT NULL default ''"
        ]

    ]

];