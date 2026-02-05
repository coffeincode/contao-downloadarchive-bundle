<?php

declare(strict_types=1);

/**
 * Table tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['downloadarchive'] =
    [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['downloadarchive'],
        'exclude' => true,
        'inputType' => 'checkbox',
        'foreignKey' => 'tl_downloadarchive.title',
        'eval' => ['multiple' => true, 'mandatory' => true, ],
        'sql' => "text NULL",

    ];

$GLOBALS['TL_DCA']['tl_content']['fields']['downloadShowMeta'] =
    [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['downloadShowMeta'],
        'exclude' => true,
        'inputType' => 'checkbox',
        'eval' => [],
        'sql' => "char(1) NOT NULL default '1'"
    ];

$GLOBALS['TL_DCA']['tl_content']['fields']['downloadHideDate'] =
    [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['downloadHideDate'],
        'exclude' => true,
        'inputType' => 'checkbox',
        'eval' => [],
        'sql' => "char(1) NOT NULL default '0'"
    ];

$GLOBALS['TL_DCA']['tl_content']['fields']['downloadNumberOfItems'] =
    [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['downloadNumberOfItems'],
        'default' => 0,
        'exclude' => true,
        'inputType' => 'text',
        'eval' => ['rgxp' => 'digit', 'tl_class' => 'w50'],
        'sql' => "smallint(5) unsigned NOT NULL default '0'"
    ];

$GLOBALS['TL_DCA']['tl_content']['fields']['downloadSorting'] =
    [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['downloadSorting'],
        'exclude' => true,
        'inputType' => 'select',
        'options' => ['sorting ASC', 'sorting DESC', 'tstamp ASC', 'tstamp DESC', 'title ASC', 'title DESC'],
        'reference' => &$GLOBALS['TL_LANG']['tl_content']['downloadarchivSortingOptions'],
        'eval' => [],
        'sql' => "varchar(25) NOT NULL default ''"
    ];

$GLOBALS['TL_DCA']['tl_content']['palettes']['downloadarchive'] = '{type_legend},type,headline;{downloadarchive_legend},downloadarchive,downloadSorting,downloadNumberOfItems,perPage;{downloadmeta_legend:hide},downloadShowMeta,downloadHideDate;{template_legend:hide},customTpl;{protected_legend:hide},protected,guests;{expert_legend:hide},cssID;{invisible_legend}, invisible,start,stop;';