<?php


declare(strict_types=1);


//'palettes' => [
//        '__selector__'   => ['loadDirectory'],
//        'default' => '{title_legend},title,class;{directory_legend:hide},loadDirectory;{publish_legend},published,start,stop',
//    ],
//    'subpalettes' => ['loadDirectory' => 'dirSRC,loadSubdir,extension,prefix,publishAll'],
//['TL_LANG']['tl_downloadarchive']['loadDirectory']
$GLOBALS['TL_LANG']['tl_downloadarchive']['title'] = ['Nazwa', 'Przypisz nazwę do tego archiwum pobierania. Będzie widoczna tylko w zapleczu.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['class'] = ['Klasa CSS', 'Możesz przypisać klasę CSS do tego archiwum, która zostanie przypisana do wszystkich plików w interfejsie.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['title_legend'] = 'Tytuł';
$GLOBALS['TL_LANG']['tl_downloadarchive']['directory_legend'] = 'Odczytaj katalog';

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadDirectory'] = ['Załaduj katalog', 'Działa tylko, jeśli nie ma jeszcze plików połączonych z tym archiwum pobierania: Załaduj katalog z systemu plików, co doda wszystkie zawarte w nim pliki.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['dirSRC'] = ['Wybierz katalog','Wybierz katalog do przeskanowania.'];

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadSubdir'] = ['Skanuj podkatalogi', 'Czy chcesz skanować podkatalogi?'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['extension'] = ['Rozszerzenie pliku', 'Możesz ograniczyć pliki do określonego rozszerzenia. Oddziel wiele typów przecinkiem.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['prefix'] = ['Użyj prefiksu', 'Możesz automatycznie generować tytuł każdego elementu z tego ciągu prefiksu, po którym następuje automatycznie generowany numer.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publishAll'] = ['Publikuj wszystkie pliki automatycznie', 'Opublikuj wszystkie pliki automatycznie przy pierwszym imporcie.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publish_legend'] = 'Publikuj';
$GLOBALS['TL_LANG']['tl_downloadarchive']['published'] = ['Publikuj archiwum', 'Tylko jeśli ta opcja jest zaznaczona, dane będą również widoczne w interfejsie.'];


