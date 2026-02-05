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

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title'] = ['Título', 'Asigne una descripción breve al archivo a descargar.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['description'] = ['Descripción', 'Puede asignar una clase CSS a este archivo que se asignará a todos los archivos en el frontend.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title_legend'] ='Título y descripción';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['file_legend'] = 'Archivo';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['image_legend'] = 'Mostrar imagen de vista previa';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protection_legend'] = 'Protección de archivos';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['addImage'] = ['Usar imagen', 'Marque si desea mostrar una vista previa o una imagen representativa del archivo a descargar.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['loadSubdir'] = ['Escanear subdirectorios', '¿Desea escanear subdirectorios?'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['guests'] = ['Mostrar solo a invitados', 'Mostrar archivo solo a visitantes que no hayan iniciado sesión.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protected'] = ['Proteger archivo', 'Mostrar archivo solo a grupos de miembros específicos.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['publish_legend'] = 'Publicar descarga';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['published'] = ['Publicar entrada', 'Si no selecciona esta opción, la entrada no será visible para los visitantes de su sitio web.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference'] =['ninguno', 'Vista grande','Enlace de descarga'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['caption']=['Leyenda','Esto aparecerá debajo de la imagen, según la configuración/template también en el infobox.'];
