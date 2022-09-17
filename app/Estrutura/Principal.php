<?php

namespace App\Estrutura;

class Principal{

    public static function salvaJson($xDadosNovos){
        
        $aDadosJson = [];

        $xJson = file_get_contents("./dadosJson.json");

        if(!empty($xJson)){
            $aDadosJson[] = json_decode($xJson, true);
        }
        
        $aDadosNovos = json_decode($xDadosNovos, true);

        $aDadosJson[] = $aDadosNovos;

        $sArquivo = "dadosJson.json";

        $getArquivo = fopen($sArquivo, "a+");

        $xDadosJson = json_encode($aDadosJson);

        fwrite($getArquivo, $xDadosJson);
    }

}