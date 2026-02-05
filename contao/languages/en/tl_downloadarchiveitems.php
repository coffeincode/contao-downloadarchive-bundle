<?php


declare(strict_types=1);
/*

'__selector__'                => ['protected','addImage'],
        'default'                     => '{title_legend},title,description;{file_legend:hide},singleSRC,createImage;'
 .'{image_legend:hide},addImage;'
 .'{protection_legend:hide},guests,protected;'
 .'{publish_legend},published,start,stop'
    ],
    'subpalettes' => [
    'protected'                   => 'groups',
    'addImage'                    => 'imgSRC,alt,size'
*/

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title'] = ['Title', 'Assign a short description to the file to be downloaded.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['description'] = ['Description', 'You can assign a CSS class to this archive which will then be assigned to all files in the frontend.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title_legend'] ='Title and description';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['file_legend'] = 'File';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['image_legend'] = 'Show preview image';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protection_legend'] = 'File protection';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['addImage'] = ['Use image', 'Check if you want to show a preview or representative image of the file to be downloaded.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['loadSubdir'] = ['Scan subdirectories', 'Do you want to scan subdirectories?'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['guests'] = ['Show to guests only', 'Show file only to visitors who are not logged in.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protected'] = ['Protect file', 'Show file only to specific member groups.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['publish_legend'] = 'Publish download';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['published'] = ['Publish entry', 'If you do not select this option, the entry will not be visible to visitors of your website.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference'] =['none', 'Large view','Download link'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['caption']=['Caption','This will appear below the image, depending on configuration/template also in the infobox.'];
