<?php


declare(strict_types=1);


//'palettes' => [
//        '__selector__'   => ['loadDirectory'],
//        'default' => '{title_legend},title,class;{directory_legend:hide},loadDirectory;{publish_legend},published,start,stop',
//    ],
//    'subpalettes' => ['loadDirectory' => 'dirSRC,loadSubdir,extension,prefix,publishAll'],
//['TL_LANG']['tl_downloadarchive']['loadDirectory']
$GLOBALS['TL_LANG']['tl_downloadarchive']['title'] = ['Nome', 'Atribua um nome a este arquivo de downloads. Este será apenas visível no backend.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['class'] = ['Classe CSS', 'Pode atribuir uma classe CSS a este arquivo que será atribuída a todos os ficheiros no frontend.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['title_legend'] = 'Título';
$GLOBALS['TL_LANG']['tl_downloadarchive']['directory_legend'] = 'Ler diretório';

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadDirectory'] = ['Carregar diretório', ' Isto funciona apenas se ainda não houver ficheiros conectados a este arquivo de downloads: Carregue o diretório do sistema de ficheiros, o que adicionará todos os ficheiros contidos nele.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['dirSRC'] = ['Selecionar diretório','Selecione o diretório a analisar.'];

$GLOBALS['TL_LANG']['tl_downloadarchive']['loadSubdir'] = ['Analisar subdiretórios', 'Deseja analisar subdiretórios?'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['extension'] = ['Extensão de ficheiro', 'Pode limitar os ficheiros a uma extensão específica. Separe vários tipos com uma vírgula.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['prefix'] = ['Usar prefixo', 'Pode gerar automaticamente o título de cada elemento a partir desta cadeia de prefixo seguida de um número gerado automaticamente.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publishAll'] = ['Publicar todos os ficheiros automaticamente', 'Publique todos os ficheiros automaticamente na primeira importação.'];
$GLOBALS['TL_LANG']['tl_downloadarchive']['publish_legend'] = 'Publicar';
$GLOBALS['TL_LANG']['tl_downloadarchive']['published'] = ['Publicar arquivo', 'Apenas se esta opção for selecionada, os dados também serão visíveis no frontend.'];


