<?php

declare(strict_types=1);

use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveModel;

$GLOBALS['TL_DCA']['tl_module']['palettes']['downloadarchive'] = '{title_legend},name,headline,type;{config_legend},downloadarchive;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';

$GLOBALS['TL_DCA']['tl_module']['fields']['downloadarchive'] = [
    'inputType' => 'select',
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
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "int(10) unsigned NOT NULL default 0",
    'relation' => ['table' => 'tl_downloadarchive', 'type' => 'belongsTo', 'load' => 'lazy'],
];
