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

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title'] = ['Titolo', 'Assegna una breve descrizione al file da scaricare.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['description'] = ['Descrizione', 'Puoi assegnare una classe CSS a questo archivio che verrà assegnata a tutti i file nel frontend.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title_legend'] ='Titolo e descrizione';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['file_legend'] = 'File';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['image_legend'] = 'Mostra immagine di anteprima';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protection_legend'] = 'Protezione file';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['addImage'] = ['Usa immagine', 'Spunta se vuoi mostrare un\'anteprima o un\'immagine rappresentativa del file da scaricare.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['loadSubdir'] = ['Analizza sottodirectory', 'Vuoi analizzare le sottodirectory?'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['guests'] = ['Mostra solo agli ospiti', 'Mostra il file solo ai visitatori che non hanno effettuato l\'accesso.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protected'] = ['Proteggi file', 'Mostra il file solo a gruppi di membri specifici.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['publish_legend'] = 'Pubblica download';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['published'] = ['Pubblica voce', 'Se non selezioni questa opzione, la voce non sarà visibile ai visitatori del tuo sito.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference'] =['nessuno','Vista grande','Link download'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['caption']=['Didascalie','Questa apparirà sotto l\'immagine, a seconda della configurazione/template anche nell\'infobox.'];
