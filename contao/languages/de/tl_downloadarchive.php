<?php


declare(strict_types=1);



//'palettes' => [
//        '__selector__'   => ['loadDirectory'],
//        'default' => '{title_legend},title,class;{directory_legend:hide},loadDirectory;{publish_legend},published,start,stop',
//    ],
//    'subpalettes' => ['loadDirectory' => 'dirSRC,loadSubdir,extension,prefix,publishAll'],
//['TL_LANG']['tl_downloadarchive']['loadDirectory']
$GLOBALS['TL_LANG']['tl_downloadarchive']['title'] = ['Name', 'Weisen Sie diesem Download-Archiv einen Namen zu. Dieser wird nur im Backend sichtbar sein.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['class'] = ['CSS-Klasse', 'Sie können diesem Archiv eine CSS-Klasse zuweisen, die dann allen Dateien im Frontend zugewiesen wird.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['title_legend'] = 'Titel';
$GLOBALS['TL_LANG']['tl_downloadarchive']['directory_legend'] = 'Verzeichnis lesen';

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadDirectory'] = ['Verzeichnis laden', 'Dies funktioniert nur, wenn noch keine Dateien mit diesem Download-Archiv verbunden sind: Laden Sie das Verzeichnis aus dem Dateisystem, wodurch alle darin enthaltenen Dateien hinzugefügt werden. '];
$GLOBALS['TL_LANG']['tl_downloadarchive']['dirSRC'] = ['Verzeichnis auswählen','Wählen Sie das zu scannende Verzeichnis aus.'];

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadSubdir'] = ['Unterverzeichnisse scannen', 'Möchten Sie Unterverzeichnisse scannen?'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['extension'] = ['Dateiendung', 'Sie können die Dateien auf eine bestimmte Dateiendung beschränken. Trennen Sie mehrere Typen durch ein Komma.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['prefix'] = ['Präfix verwenden', 'Sie können den Titel jedes Elements automatisch aus dieser Präfixzeichenfolge gefolgt von einer automatisch generierten Nummer generieren.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publishAll'] = ['Alle Dateien automatisch veröffentlichen', 'Veröffentlichen Sie alle Dateien automatisch beim ersten Import.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publish_legend'] = 'Veröffentlichen';
$GLOBALS['TL_LANG']['tl_downloadarchive']['published'] = ['Archiv veröffentlichen', 'Nur wenn dieser Option gewählt ist, werden die Daten auch im Frontend sichtbar.'];


