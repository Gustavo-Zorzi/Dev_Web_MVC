<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/routes.php';

use App\Estrutura\Principal;

if(isset($_POST['oPOST'])){

    $sAcao = Principal::getAcaoPOST($_POST['oPOST']);

    Principal::salvaJson($_POST['oPOST'], $sAcao);
}

$sConteudoPagina = render(
    $_POST['pg'] ??= $_GET['pg'] ??= 'home' // Página padrão: 'home'
);

echo $sConteudoPagina;
