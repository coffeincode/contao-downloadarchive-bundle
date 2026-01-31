<?php


declare(strict_types=1);

use Contao\Config;
use Contao\System;
use Contao\DataContainer;
use Contao\DC_Table;
use Contao\BackendUser;

System::loadLanguageFile('tl_content');

$strtable = 'tl_downloadarchiveitems';

$GLOBALS['TL_DCA'][$strtable] = [

    'config' => [
        'dataContainer' => DC_Table::class,
        'ptable' => 'tl_downloadarchive',
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
                'pid' => 'index',
            ],
        ],
    ],

    'list' => [
        'sorting' => [
            'mode' => DataContainer::MODE_PARENT,
            //todo: correct? Dummy said something different
            'fields' => ['sorting'],
            'panelLayout' => 'filter;search,limit',
            'defaultSearchField' => 'title',
            'disableGrouping' => true,
            'headerFields' => ['title'],
            //todo: ?
            //'child_record_callback'   => array('tl_downloadarchiveitems', 'listFiles'),
            'renderAsGrid' => true,
            'limitHeight' => 160,
        ],
        //todo: can this stay? It's from dummy
        'label' => [
            'fields' => ['title'],

        ]
    ],

    'palettes' => [

        '__selector__'                => ['protected','addImage'],
        'default'                     => '{title_legend},title,description;{file_legend:hide},singleSRC;'
            .'{image_legend:hide},addImage;'
            .'{protection_legend:hide},guests,protected;'
            .'{publish_legend},published,start,stop'
    ],
    'subpalettes' => [
        'protected'                   => 'groups',
        'addImage'                    => 'imgSRC, useImage,alt,caption, size, floating'
    ],
    'fields' => [

        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment",
        ],
        'pid' => [
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],
        'sorting' => [
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default 0",
        ],
        'title' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => ['mandatory'=>true, 'basicEntities'=>true, 'maxlength'=>255],
            'sql'                     => "varchar(255) NOT NULL default ''"
        ],
        'description' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['description'],
            'exclude'                 => true,
            'inputType'               => 'textarea',
            'eval'                    => ['rte'=>'tinyMCE','mandatory'=> false, 'basicEntities' => true, 'maxlength' => 255],
            'sql'                     => "varchar(255) NOT NULL default ''"
        ],
        'singleSRC' => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_content']['singleSRC'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval'                    => ['mandatory'=>true,'files'=>true,'fieldType'=>'radio'],
            'sql'                     => "binary(16) NULL"
        ],
        'protected' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protected'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('submitOnChange'=>true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'guests' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['guests'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'groups' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['groups'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'foreignKey'              => 'tl_member_group.name',
            'eval'                    => array('multiple'=>true),
            'sql'                     => "blob NULL"
        ),
        'addImage' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['addImage'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('submitOnChange'=>true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'imgSRC' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_content']['singleSRC'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval'                    => array('mandatory'=>true,'files'=>true,'fieldType'=>'radio', 'tl_class'=>'w50'),
            'sql'                     => "binary(16) NULL"
        ),

        'size'=> [
            'label'                   => &$GLOBALS['TL_LANG']['MSC']['imgSize'],
			'inputType'               => 'imageSize',
			'reference'               => &$GLOBALS['TL_LANG']['MSC'],
			'eval'                    => array('rgxp'=>'natural', 'includeBlankOption'=>true, 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50 clr'),
			//todo: transform into eventlistener?
            'options_callback' => static function () {
                                return System::getContainer()->get('contao.image.sizes')->getOptionsForUser(BackendUser::getInstance());
                    },
			'sql'                     => "varchar(64) NOT NULL default ''"
        ],
        'alt'=> [
            'label' => &$GLOBALS['TL_LANG']['tl_content']['alt'],
            'inputType' => 'text',
            'exclude' => true,
            'eval' => ['mandatory'=>false, 'rgxp'=>'extnd', 'maxlength'=>255, 'tl_class'=>'long clr'],
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        'caption'=> [
            'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['caption'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'extnd', 'maxlength'=>255, 'tl_class'=>'long'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ],
        'floating'  => [
            'label'                   => &$GLOBALS['TL_LANG']['tl_content']['floating'],
            'exclude'                 => true,
            'inputType'               => 'radioTable',
            'options'                 => array('above', 'left', 'right'),
            'eval'                    => array('cols'=>3, 'tl_class'=>'w50'),
            'reference'               => &$GLOBALS['TL_LANG']['MSC'],
            'sql'                     => "varchar(32) NOT NULL default ''"
        ],
		'useImage' => [
			'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImage'],
			'exclude'                 => true,
			'default'                 => '0',
			'inputType'               => 'radio',
			'options'				  => array('0','1','2'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference'],
			'eval'					  => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default '0'"
		],
        'published' => [

            'inputType' => 'checkbox',
            'filter' => true,
            'toggle' => true,
            'flag'                    => DataContainer::SORT_INITIAL_LETTER_DESC,
            'eval' => ['doNotCopy'=>true],
            //todo: original says 'sql'  => array('type' => 'boolean', 'default' => false)?!
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
        ],



    ]

];
