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

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title'] = ['Titre', 'Attribuez une breve description au fichier a telecharger.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['description'] = ['Description', 'Vous pouvez attribuer une classe CSS a cette archive, qui sera appliquee a tous les fichiers dans le front-end.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title_legend'] = 'Titre et description';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['file_legend'] = 'Fichier';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['image_legend'] = 'Afficher l\'image d\'apercu';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protection_legend'] = 'Protection du fichier';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['addImage'] = ['Utiliser une image', 'Verifiez si vous voulez afficher un apercu ou une image representative du fichier a telecharger.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['loadSubdir'] = ['Scanner les sous-repertoires', 'Voulez-vous scanner les sous-repertoires ?'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['guests'] = ['Afficher uniquement aux invites', 'Afficher le fichier uniquement aux visiteurs qui ne sont pas connectes.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protected'] = ['Proteger le fichier', 'Afficher le fichier uniquement a certains groupes de membres.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['publish_legend'] = 'Publier le telechargement';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['published'] = ['Publier l\'entree', 'Si vous ne choisissez pas cette option, l\'entree ne sera pas visible pour les visiteurs de votre site.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference'] = ['Aucun', 'Vue agrandie', 'Lien de telechargement'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['caption'] = ['Legende', 'Elle apparait sous l\'image, selon la configuration/le modele aussi dans l\'infobox.'];
