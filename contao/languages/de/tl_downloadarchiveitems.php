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

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title'] = ['Titel', 'Weisen Sie dem herunterzuladenden Datei eine kurze Beschreibung zu.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['description'] = ['Beschreibung', 'Sie können diesem Archiv eine CSS-Klasse zuweisen, die dann allen Dateien im Frontend zugewiesen wird.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title_legend'] ='Titel und Beschreibung';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['file_legend'] = 'Datei';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['image_legend'] = 'Vorschaubild anzeigen';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protection_legend'] = 'Dateischutz';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['addImage'] = ['Bild verwenden', 'Überprüfen Sie, ob Sie eine Vorschau oder ein repräsentatives Bild der herunterzuladenden Datei anzeigen möchten.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['loadSubdir'] = ['Unterverzeichnisse scannen', 'Möchten Sie Unterverzeichnisse scannen?'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['guests'] = ['Nur für Gäste anzeigen', 'Datei nur für Besucher anzeigen, die nicht angemeldet sind.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protected'] = ['Datei schützen', 'Datei nur bestimmten Mitgliedergruppen anzeigen.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['publish_legend'] = 'Download veröffentlichen';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['published'] = ['Eintrag veröffentlichen', 'Wenn Sie diese Option nicht auswählen, ist der Eintrag für die Besucher Ihrer Website nicht sichtbar.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference'] =['kein', 'Großansicht','Downloadlink'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['caption']=['Bildunterschrift','Diese erscheint unterhalb des Bildes, je nach Konfiguration/Template auch in der Infobox.'];