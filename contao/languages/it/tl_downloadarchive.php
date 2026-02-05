<?php


declare(strict_types=1);


//'palettes' => [
//        '__selector__'   => ['loadDirectory'],
//        'default' => '{title_legend},title,class;{directory_legend:hide},loadDirectory;{publish_legend},published,start,stop',
//    ],
//    'subpalettes' => ['loadDirectory' => 'dirSRC,loadSubdir,extension,prefix,publishAll'],
//['TL_LANG']['tl_downloadarchive']['loadDirectory']
$GLOBALS['TL_LANG']['tl_downloadarchive']['title'] = ['Nome', 'Assegna un nome a questo archivio di download. Sarà visibile solo nel backend.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['class'] = ['Classe CSS', 'Puoi assegnare una classe CSS a questo archivio che verrà assegnata a tutti i file nel frontend.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['title_legend'] = 'Titolo';
$GLOBALS['TL_LANG']['tl_downloadarchive']['directory_legend'] = 'Leggi directory';

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadDirectory'] = ['Carica directory', 'Funziona solo se non ci sono ancora file collegati a questo archivio di download: Carica la directory dal filesystem, aggiungendo tutti i file contenuti.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['dirSRC'] = ['Seleziona directory','Seleziona la directory da analizzare.'];

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadSubdir'] = ['Analizza sottodirectory', 'Vuoi analizzare le sottodirectory?'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['extension'] = ['Estensione file', 'Puoi limitare i file a un\'estensione specifica. Separa più tipi con una virgola.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['prefix'] = ['Usa prefisso', 'Puoi generare automaticamente il titolo di ogni elemento da questa stringa di prefisso seguita da un numero generato automaticamente.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publishAll'] = ['Pubblica automaticamente tutti i file', 'Pubblica tutti i file automaticamente alla prima importazione.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publish_legend'] = 'Pubblica';
$GLOBALS['TL_LANG']['tl_downloadarchive']['published'] = ['Pubblica archivio', 'Solo se questa opzione è selezionata, i dati saranno visibili anche nel frontend.'];


