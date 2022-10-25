<?php

namespace App\Estrutura;

class Principal{

    const UPDATE = 'update';

    public static function salvaJson($xDadosNovos, $sAcao = null){

        if($sAcao === self::UPDATE){
            self::atualizarJSON($xDadosNovos);
            return;
        }

        $sArquivo = "dadosJson.json";
        
        $aDadosAtuais = json_decode(file_get_contents($sArquivo), true);

        $aDadosNovos = self::tratarDadosJson(json_decode($xDadosNovos, true));
        
        if(isset($aDadosAtuais)){
            
            array_push($aDadosAtuais, $aDadosNovos);
            
            $xDadosJson = json_encode($aDadosAtuais, JSON_PRETTY_PRINT);
            
            file_put_contents($sArquivo, $xDadosJson);
            
            return;
        } 
        
        $aDadosPrincipal = [];
        
        array_push($aDadosPrincipal, $aDadosNovos);
        
        $xDadosJson = json_encode($aDadosPrincipal, JSON_PRETTY_PRINT);
        
        file_put_contents($sArquivo, $xDadosJson);
    }  

    private static function atualizarJSON($xDadosAtualizar){

        $sArquivo = "dadosJson.json";

        $aDadosEstrutura = [];

        $aDadosAtuais = self::getDadosJson();

        $aDadosPersistir = $aDadosAtuais;

        $oDadosAtualizar = json_decode($xDadosAtualizar);

        unset($aDadosPersistir[$oDadosAtualizar->iContato - 1]);

        foreach($aDadosPersistir as $oDados){
            $aDadosEstrutura[] = $oDados;
        }

        $aDadosEstrutura[] = self::tratarDadosJsonAtualizar($oDadosAtualizar);

        $sDadosJSON = json_encode($aDadosEstrutura, JSON_PRETTY_PRINT);

        self::limpaArquivo();

        file_put_contents($sArquivo, $sDadosJSON);
    }

    public static function getAcaoPOST($sPost){

        $oPost = json_decode($sPost);

        return $oPost->sAcao;
    }

    private static function tratarDadosJsonAtualizar($oDados){

        $sDataNascimento = self::tratarDataNascimento($oDados->sDataNascimento);

        return (object) [
            'iContato'          => $oDados->iContato,    
            'sNome'             => $oDados->sNome,
            'sTelefone'         => $oDados->sTelefone,
            'sEmail'            => $oDados->sEmail,
            'sDataNascimento'   => $sDataNascimento,
            'iIdade'            => self::getIdade($sDataNascimento)
        ];
    }

    private static function tratarDadosJson($aDados){

        $sDataNascimento = self::tratarDataNascimento($aDados['sDataNascimento']);

        return [
            'iContato'          => self::getProximoCodigoContato(),    
            'sNome'             => $aDados['sNome'],
            'sTelefone'         => $aDados['sTelefone'],
            'sEmail'            => $aDados['sEmail'],
            'sDataNascimento'   => $sDataNascimento,
            'iIdade'            => self::getIdade($sDataNascimento)
        ];
    }
    
    private static function getProximoCodigoContato(){
        
        $sArquivo = "dadosJson.json";

        $aDadosJson = json_decode(file_get_contents($sArquivo), true);

        if(!$aDadosJson){
            return 1;
        }

        $iQuantidadeDados = count($aDadosJson);

        $oUltimoDadoJson = (object) $aDadosJson[$iQuantidadeDados -1];
        
        $iProximoContato = $oUltimoDadoJson->iContato + 1;

        return $iProximoContato;
    }

    public static function getDadosJson($iContato = null, $bArray = false){
        
        $aDadosJson = [];

        $sArquivo = "dadosJson.json";
        
        $aDadosJson = json_decode(file_get_contents($sArquivo), $bArray);
        
        if($iContato > 0){
            foreach($aDadosJson as $oDadosJson){
                if($oDadosJson->iContato === $iContato){
                    return $oDadosJson;
                }
            }
        }
        
        return $aDadosJson;
    }
    
    public static function existeContato($iContato){
        
        $aDadosAtuais = self::getDadosJson(null, true);

        if(!$aDadosAtuais){
            return false;
        }

        $oDadosAtuais = self::getDadosJson($iContato);

        return $oDadosAtuais->iContato === $iContato;
    }

    public static function limpaArquivo(){

        $sArquivo = "dadosJson.json";        

        unlink($sArquivo);

        fopen($sArquivo, 'w+');
    }

    private static function tratarDataNascimento($sDataNascimento){

        $sDataNascimentoTratada = str_replace("-", "/", $sDataNascimento);

        return $sDataNascimentoTratada;
    }

    public static function getIdade($sDataNascimento){
        $sHoje = date("Y-m-d");

        $sIdade = date_diff(date_create($sDataNascimento), date_create($sHoje));

        return $sIdade->format("%d Dias");
    }
}