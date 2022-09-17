<?php

namespace App\Model;

class ModelContato extends ModelPadrao {

    static function getDadosJson(){

        $xJson = file_get_contents("./dadosJson.json");

        $aDadosJson = json_decode($xJson);

        return $aDadosJson;
    }

}
