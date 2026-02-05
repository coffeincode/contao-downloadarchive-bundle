<?php


declare(strict_types=1);


//'palettes' => [
//        '__selector__'   => ['loadDirectory'],
//        'default' => '{title_legend},title,class;{directory_legend:hide},loadDirectory;{publish_legend},published,start,stop',
//    ],
//    'subpalettes' => ['loadDirectory' => 'dirSRC,loadSubdir,extension,prefix,publishAll'],
//['TL_LANG']['tl_downloadarchive']['loadDirectory']
$GLOBALS['TL_LANG']['tl_downloadarchive']['title'] = ['Name', 'Assign a name to this download archive. This will only be visible in the backend.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['class'] = ['CSS class', 'You can assign a CSS class to this archive which will then be assigned to all files in the frontend.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['title_legend'] = 'Title';
$GLOBALS['TL_LANG']['tl_downloadarchive']['directory_legend'] = 'Read directory';

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadDirectory'] = ['Load directory', 'This only works if there are no files connected with this download archive yet: Load the directory from the file system, which will add all files contained therein.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['dirSRC'] = ['Select directory','Select the directory to scan.'];

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadSubdir'] = ['Scan subdirectories', 'Do you want to scan subdirectories?'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['extension'] = ['File extension', 'You can restrict the files to a specific file extension. Separate multiple types with a comma.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['prefix'] = ['Use prefix', 'You can automatically generate the title of each element from this prefix string followed by an automatically generated number.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publishAll'] = ['Publish all files automatically', 'Publish all files automatically on the first import.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publish_legend'] = 'Publish';
$GLOBALS['TL_LANG']['tl_downloadarchive']['published'] = ['Publish archive', 'Only if this option is selected will the data also be visible in the frontend.'];


