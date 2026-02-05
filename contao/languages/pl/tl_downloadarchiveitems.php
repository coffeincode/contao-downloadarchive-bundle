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

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title'] = ['Tytuł', 'Przypisz krótki opis do pliku do pobrania.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['description'] = ['Opis', 'Możesz przypisać klasę CSS do tego archiwum, która zostanie przypisana do wszystkich plików w interfejsie.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title_legend'] ='Tytuł i opis';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['file_legend'] = 'Plik';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['image_legend'] = 'Pokaż obraz podglądu';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protection_legend'] = 'Ochrona plików';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['addImage'] = ['Użyj obrazu', 'Zaznacz, jeśli chcesz wyświetlić podgląd lub reprezentatywny obraz pliku do pobrania.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['loadSubdir'] = ['Skanuj podkatalogi', 'Czy chcesz skanować podkatalogi?'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['guests'] = ['Pokaż tylko gościom', 'Pokaż plik tylko odwiedzającym, którzy nie są zalogowani.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protected'] = ['Chroń plik', 'Pokaż plik tylko określonym grupom członkowskim.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['publish_legend'] = 'Publikuj pobieranie';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['published'] = ['Publikuj wpis', 'Jeśli nie zaznaczysz tej opcji, wpis nie będzie widoczny dla odwiedzających Twoją stronę.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference'] =['brak','Duże podgląd','Link pobierania'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['caption']=['Podpis','To pojawi się pod obrazem, w zależności od konfiguracji/szablonu również w infoboxie.'];
