<?php

declare(strict_types=1);

use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveModel;

$GLOBALS['TL_DCA']['tl_module']['palettes']['downloadarchive'] = '{title_legend},name,headline,type;{config_legend},downloadarchive,downloadSorting,downloadNumberOfItems,perPage;{downloadmeta_legend:hide},downloadShowMeta,downloadHideDate;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';

$GLOBALS['TL_DCA']['tl_module']['fields']['downloadarchive'] = [
    'inputType' => 'checkbox',
    'options_callback' => static function (): array {
        $options = [];
        $archives = DownloadarchiveModel::findAll(['order' => 'title']);

        if ($archives === null) {
            return $options;
        }

        foreach ($archives as $archive) {
            $options[$archive->id] = $archive->title;
        }

        return $options;
    },
    'eval' => ['multiple' => true, 'mandatory'=>true,'tl_class' => 'w50'],
    'sql' => "text NULL ",
    'relation' => ['table' => 'tl_downloadarchive', 'type' => 'belongsTo', 'load' => 'lazy'],
];

$GLOBALS['TL_DCA']['tl_module']['fields']['downloadShowMeta'] =
    [
        'label'                   => &$GLOBALS['TL_LANG']['tl_module']['downloadShowMeta'],
        'exclude'                 => true,
        'inputType'               => 'checkbox',
        'eval'                    => [],
        'sql'                     => "char(1) NOT NULL default '1'"
    ];

$GLOBALS['TL_DCA']['tl_module']['fields']['downloadHideDate'] =
    [
        'label'                   => &$GLOBALS['TL_LANG']['tl_module']['downloadHideDate'],
        'exclude'                 => true,
        'inputType'               => 'checkbox',
        'eval'                    => [],
        'sql'                     => "char(1) NOT NULL default '0'"
    ];

$GLOBALS['TL_DCA']['tl_module']['fields']['downloadSorting'] =
    [
        'label'                   => &$GLOBALS['TL_LANG']['tl_module']['downloadSorting'],
        'exclude'                 => true,
        'inputType'               => 'select',
        'default'         => 'sorting ASC',
        'options'                 => ['sorting ASC','sorting DESC','tstamp ASC','tstamp DESC','title ASC','title DESC'],
        'reference'               => &$GLOBALS['TL_LANG']['tl_module']['downloadarchivSortingOptions'],
        'eval'                    => ['tl_class' => 'w50 '],
        'sql'                     => "varchar(25) NOT NULL default ''"
    ];
$GLOBALS['TL_DCA']['tl_module']['fields']['downloadNumberOfItems'] =
    [
        'label'                   => &$GLOBALS['TL_LANG']['tl_module']['downloadNumberOfItems'],
        'default'                 => 0,
        'exclude'                 => true,
        'inputType'               => 'text',
        'eval'                    => ['rgxp' => 'digit', 'tl_class' => 'w50 clear'],
        'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
    ];

