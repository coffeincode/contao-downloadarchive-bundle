<?php



use Contao\CoreBundle\DataContainer\PaletteManipulator;

// Extend the default palette
PaletteManipulator::create()
    ->addLegend('downloadarchive_legend', 'amg_legend', PaletteManipulator::POSITION_BEFORE)
    ->addField(array('downloadarchives', 'downloadarchivep'), 'downloadarchive_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_user_group')
;

// Add fields to tl_user_group


$GLOBALS['TL_DCA']['tl_user_group']['fields']['downloadarchives'] =
    [
        'label'                   => &$GLOBALS['TL_LANG']['tl_user']['downloadarchives'],
        //'exclude'                 => true,
        'inputType'               => 'checkbox',
        'foreignKey'              => 'tl_downloadarchive.title',
        'eval'                    => ['multiple' => true],
        'sql'                     => "blob NULL",
        'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
    ];

$GLOBALS['TL_DCA']['tl_user_group']['fields']['downloadarchivep'] =
    [
        'label'                   => &$GLOBALS['TL_LANG']['tl_user']['downloadarchivep'],
        //'exclude'                 => true,
        'inputType'               => 'checkbox',
        'options'                 => ['create', 'delete'],
        'reference'               => &$GLOBALS['TL_LANG']['MSC'],
        'eval'                    => ['multiple' => true],
        'sql'                     => "blob NULL"
    ];