<?php


declare(strict_types=1);


//'palettes' => [
//        '__selector__'   => ['loadDirectory'],
//        'default' => '{title_legend},title,class;{directory_legend:hide},loadDirectory;{publish_legend},published,start,stop',
//    ],
//    'subpalettes' => ['loadDirectory' => 'dirSRC,loadSubdir,extension,prefix,publishAll'],
//['TL_LANG']['tl_downloadarchive']['loadDirectory']
$GLOBALS['TL_LANG']['tl_downloadarchive']['title'] = ['Naam', 'Wijs een naam toe aan dit downloadarchief. Deze zal alleen zichtbaar zijn in de backend.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['class'] = ['CSS-klasse', 'U kunt dit archief een CSS-klasse toewijzen die dan aan alle bestanden in de frontend wordt toegewezen.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['title_legend'] = 'Titel';
$GLOBALS['TL_LANG']['tl_downloadarchive']['directory_legend'] = 'Directory lezen';

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadDirectory'] = ['Directory laden', 'Dit werkt alleen als er nog geen bestanden verbonden zijn met dit downloadarchief: Laad de directory uit het bestandssysteem, waardoor alle daarin opgenomen bestanden worden toegevoegd. '];
$GLOBALS['TL_LANG']['tl_downloadarchive']['dirSRC'] = ['Directory selecteren','Selecteer de directory die gescand moet worden.'];

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadSubdir'] = ['Subdirectories scannen', 'Wilt u subdirectories scannen?'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['extension'] = ['Bestandsextensie', 'U kunt de bestanden beperken tot een bepaalde bestandsextensie. Scheid meerdere types door een komma.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['prefix'] = ['Prefix gebruiken', 'U kunt de titel van elk element automatisch genereren uit deze prefixstring gevolgd door een automatisch gegenereerd nummer.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publishAll'] = ['Alle bestanden automatisch publiceren', 'Publiceer alle bestanden automatisch bij de eerste import.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publish_legend'] = 'Publiceren';
$GLOBALS['TL_LANG']['tl_downloadarchive']['published'] = ['Archief publiceren', 'Alleen als deze optie is geselecteerd, zullen de gegevens ook zichtbaar zijn in de frontend.'];


