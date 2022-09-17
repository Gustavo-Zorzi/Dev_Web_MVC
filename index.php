<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/routes.php';

use App\Estrutura\Principal;

if(isset($_POST['dadosCampos'])){
    $xDadosCampos = $_POST['dadosCampos'];
    Principal::salvaJson($xDadosCampos);
}

$sConteudoPagina = render(
    $_POST['pg'] ??= $_GET['pg'] ??= 'home' // Página padrão: 'home'
);

echo $sConteudoPagina;
