<?php


declare(strict_types=1);


//'palettes' => [
//        '__selector__'   => ['loadDirectory'],
//        'default' => '{title_legend},title,class;{directory_legend:hide},loadDirectory;{publish_legend},published,start,stop',
//    ],
//    'subpalettes' => ['loadDirectory' => 'dirSRC,loadSubdir,extension,prefix,publishAll'],
//['TL_LANG']['tl_downloadarchive']['loadDirectory']
$GLOBALS['TL_LANG']['tl_downloadarchive']['title'] = ['Nombre', 'Asigne un nombre a este archivo de descargas. Este solo será visible en el backend.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['class'] = ['Clase CSS', 'Puede asignar una clase CSS a este archivo que se asignará a todos los archivos en el frontend.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['title_legend'] = 'Título';
$GLOBALS['TL_LANG']['tl_downloadarchive']['directory_legend'] = 'Leer directorio';

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadDirectory'] = ['Cargar directorio', 'Esto solo funciona si aún no hay archivos conectados con este archivo de descargas: Cargue el directorio del sistema de archivos, lo que agregará todos los archivos contenidos en él.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['dirSRC'] = ['Seleccionar directorio','Seleccione el directorio a escanear.'];

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadSubdir'] = ['Escanear subdirectorios', '¿Desea escanear subdirectorios?'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['extension'] = ['Extensión de archivo', 'Puede limitar los archivos a una extensión de archivo específica. Separe varios tipos con una coma.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['prefix'] = ['Usar prefijo', 'Puede generar automáticamente el título de cada elemento a partir de esta cadena de prefijo seguida de un número generado automáticamente.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publishAll'] = ['Publicar todos los archivos automáticamente', 'Publique todos los archivos automáticamente en la primera importación.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publish_legend'] = 'Publicar';
$GLOBALS['TL_LANG']['tl_downloadarchive']['published'] = ['Publicar archivo', 'Solo si se selecciona esta opción, los datos también serán visibles en el frontend.'];


