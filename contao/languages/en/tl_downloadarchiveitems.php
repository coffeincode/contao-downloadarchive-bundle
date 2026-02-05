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
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title'] = ['Title', 'Assign a short description of the file to download.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['description'] = ['Description', 'You can assign a css-class to this archive, which will be assigned to every file in the frontend.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title_legend'] ='Title and description';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['file_legend'] = 'File';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['image_legend'] = 'Show preview image';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protection_legend'] = 'File protection';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['addImage'] = ['Use an image', 'Check if you want to show a preview or representative image of the file to download.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['loadSubdir'] = ['Scan subdirectories', 'Do you want to scan subdirectories?'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['guests'] = ['Only show to guests', 'Show file only to visitors who are not logged in.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protected'] = ['Protect file', 'Show file to certain member groups only.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['publish_legend'] = 'Publish Download';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['published'] = ['Publish entry', 'Unless you choose this option the entry will not be visible to the visitors of your website.'];
