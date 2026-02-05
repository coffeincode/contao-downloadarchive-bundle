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

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title'] = ['Titel', 'Wijs een korte beschrijving toe aan het te downloaden bestand.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['description'] = ['Beschrijving', 'U kunt dit archief een CSS-klasse toewijzen die dan aan alle bestanden in de frontend wordt toegewezen.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title_legend'] ='Titel en beschrijving';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['file_legend'] = 'Bestand';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['image_legend'] = 'Voorbeeldafbeelding tonen';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protection_legend'] = 'Bestandsbeveiliging';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['addImage'] = ['Afbeelding gebruiken', 'Vink aan of u een voorbeeld of representatieve afbeelding van het te downloaden bestand wilt tonen.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['loadSubdir'] = ['Subdirectories scannen', 'Wilt u subdirectories scannen?'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['guests'] = ['Alleen voor gasten tonen', 'Bestand alleen tonen aan bezoekers die niet zijn ingelogd.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protected'] = ['Bestand beveiligen', 'Bestand alleen tonen aan bepaalde lidgroepen.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['publish_legend'] = 'Download publiceren';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['published'] = ['Item publiceren', 'Als u deze optie niet selecteert, is het item niet zichtbaar voor de bezoekers van uw website.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference'] =['geen', 'Grote weergave','Downloadlink'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['caption']=['Bijschrift','Dit verschijnt onder de afbeelding, afhankelijk van de configuratie/template ook in de infobox.'];
