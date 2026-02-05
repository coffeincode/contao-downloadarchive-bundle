<?php


declare(strict_types=1);



//'palettes' => [
//        '__selector__'   => ['loadDirectory'],
//        'default' => '{title_legend},title,class;{directory_legend:hide},loadDirectory;{publish_legend},published,start,stop',
//    ],
//    'subpalettes' => ['loadDirectory' => 'dirSRC,loadSubdir,extension,prefix,publishAll'],
//['TL_LANG']['tl_downloadarchive']['loadDirectory']
$GLOBALS['TL_LANG']['tl_downloadarchive']['title'] = ['Nom', 'Attribuez un nom a cette archive de telechargement. Celui-ci ne sera visible que dans le backend.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['class'] = ['Classe CSS', 'Vous pouvez attribuer une classe CSS a cette archive, qui sera attribuee a tous les fichiers dans le front-end.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['title_legend'] = 'Titre';
$GLOBALS['TL_LANG']['tl_downloadarchive']['directory_legend'] = 'Lire le repertoire';

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadDirectory'] = ['Charger le repertoire', 'Cela ne fonctionne que si aucun fichier n\'est encore lie a cette archive de telechargement : chargez le repertoire depuis le systeme de fichiers, ce qui ajoute tous les fichiers qu\'il contient. '];
$GLOBALS['TL_LANG']['tl_downloadarchive']['dirSRC'] = ['Selectionner le repertoire', 'Selectionnez le repertoire a analyser.'];

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadSubdir'] = ['Scanner les sous-repertoires', 'Voulez-vous scanner les sous-repertoires ?'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['extension'] = ['Extension de fichier', 'Vous pouvez limiter les fichiers a une extension precise. Separez plusieurs types par une virgule.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['prefix'] = ['Utiliser un prefixe', 'Vous pouvez generer automatiquement le titre de chaque element a partir de cette chaine de prefixe suivie d\'un numero genere automatiquement.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publishAll'] = ['Publier automatiquement tous les fichiers', 'Publier automatiquement tous les fichiers lors du premier import.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publish_legend'] = 'Publier';
$GLOBALS['TL_LANG']['tl_downloadarchive']['published'] = ['Publier l\'archive', 'Ce n\'est que si cette option est selectionnee que les donnees seront visibles dans le front-end.'];
