<?php
declare(strict_types=1);
use Contao\CoreBundle\DataContainer\PaletteManipulator;

// Extend the default palettes
PaletteManipulator::create()
    ->addLegend('downloadarchive_legend', 'amg_legend', PaletteManipulator::POSITION_BEFORE)
    ->addField(array('downloadarchives','downloadarchivep'), 'downloadarchive_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('extend', 'tl_user')
    ->applyToPalette('custom', 'tl_user')
;

// Add fields to tl_user



//$GLOBALS['TL_DCA']['tl_user']['palettes']['extend'] = str_replace('fop;', 'fop;{downloadarchive_legend},downloadarchives,downloadarchivep;', $GLOBALS['TL_DCA']['tl_user']['palettes']['extend']);
//$GLOBALS['TL_DCA']['tl_user']['palettes']['custom'] = str_replace('fop;', 'fop;{downloadarchive_legend},downloadarchives,downloadarchivep;', $GLOBALS['TL_DCA']['tl_user']['palettes']['custom']);

/**
 * Add fields to tl_user_group
 */
$GLOBALS['TL_DCA']['tl_user']['fields']['downloadarchives'] =
    [
        'label'                   => &$GLOBALS['TL_LANG']['tl_user']['downloadarchives'],
        'inputType'               => 'checkbox',
        'foreignKey'              => 'tl_downloadarchive.title',
        'eval'                    => ['multiple' => true],
        'sql'                     => "blob NULL",
        'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
    ];

$GLOBALS['TL_DCA']['tl_user']['fields']['downloadarchivep'] =
    [
        //'label'                   => &$GLOBALS['TL_LANG']['tl_user']['downloadarchivep'],
        //'exclude'                 => true,
        'inputType'               => 'checkbox',
        'options'                 => ['create', 'delete'],
        'reference'               => &$GLOBALS['TL_LANG']['MSC'],
        'eval'                    => ['multiple' => true],
        'sql'                     => "blob NULL"
    ];