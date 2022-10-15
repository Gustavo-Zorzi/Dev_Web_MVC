<?php

namespace App\Model;

use App\Estrutura\Principal;

class ModelContato extends ModelPadrao {

    private $iContato;
    private $sNome;
    private $sTelefone;
    private $sEmail;
    private $sDataNascimento;
    private $sIdade;
    
    public function getContato(){
        return $this->iContato;
    }

    public function setContato($iContato){
        $this->iContato = $iContato;
    }

    public function getNome(){
        return $this->sNome;
    }

    public function setNome($sNome){
        $this->sNome = $sNome;
    }

    public function getTelefone(){
        return $this->sTelefone;
    }

    public function setTelefone($sTelefone){
        $this->sTelefone = $sTelefone;
    }

    public function getEmail(){
        return $this->sEmail;
    }

    public function setEmail($sEmail){
        $this->sEmail = $sEmail;
    }

    public function getDataNascimento(){
        return $this->sDataNascimento;
    }

    public function setDataNascimento($sDataNascimento){
        $this->sDataNascimento = $sDataNascimento;
    }

    public function getIdade(){
        return $this->sIdade;
    }

    public function setIdade($sDataNascimento){
        $this->sIdade = Principal::getIdade($sDataNascimento);
    }

    function destroy(){

        $aDadosJson = Principal::getDadosJson(null, true);

        $aDadosPersistir = $aDadosJson;

        unset($aDadosPersistir[$this->getContato() - 1]);

        $aDadosExcluidos = array_diff_key($aDadosJson, $aDadosPersistir);

        $aDadosPersistir = array_diff_key($aDadosJson, $aDadosExcluidos);
        
        Principal::limpaArquivo();
        
        if(count($aDadosJson) > 1){

            foreach($aDadosPersistir as $aDados){
                $xDadosJson = json_encode($aDados, JSON_PRETTY_PRINT);
                Principal::salvaJson($xDadosJson);
            }
        }
    }

    function update(){

    }
}
