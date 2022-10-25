<?php

namespace Ajax;

class Ajax {

    public static function getChave($xChave){

        $oChave = json_decode($xChave);

        $sPesquisa = $oChave->sPesquisa;

        self::getDadosContato($sPesquisa);
    }
    
    private static function getDadosContato($sPesquisa){

        $aPesquisa = [];

        $sArquivo = 'dadosJson.json';

        $aDadosJson = json_decode(file_get_contents($sArquivo), true);

        foreach($aDadosJson as $aDadosContato){
            $aPesquisa[] = array_search($sPesquisa, $aDadosContato, false);
        }

        var_dump($aPesquisa);
    }

    public function setRetorno(){

    }
}

if(isset($_REQUEST['chave'])){
    Ajax::getChave($_REQUEST['chave']);
}
