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

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title'] = ['Título', 'Atribua uma breve descrição ao ficheiro a descarregar.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['description'] = ['Descrição', 'Pode atribuir uma classe CSS a este arquivo que será atribuída a todos os ficheiros no frontend.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title_legend'] ='Título e descrição';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['file_legend'] = 'Ficheiro';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['image_legend'] = 'Mostrar imagem de pré-visualização';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protection_legend'] = 'Proteção de ficheiros';

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['addImage'] = ['Usar imagem', 'Marque se deseja mostrar uma pré-visualização ou uma imagem representativa do ficheiro a descarregar.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['loadSubdir'] = ['Analisar subdiretórios', 'Deseja analisar subdiretórios?'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['guests'] = ['Mostrar apenas a convidados', 'Mostrar ficheiro apenas a visitantes que não tenham iniciado sessão.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protected'] = ['Proteger ficheiro', 'Mostrar ficheiro apenas a grupos de membros específicos.'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['publish_legend'] = 'Publicar download';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['published'] = ['Publicar entrada', 'Se não selecionar esta opção, a entrada não será visível para os visitantes do seu site.'];

$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference'] =['nenhum', 'Vista grande','Link de download'];
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['caption']=['Legenda','Isto aparecerá abaixo da imagem, dependendo da configuração/template também no infobox.'];
