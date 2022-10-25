<?php

namespace App\Controller;

use App\Controller\ControllerPadrao,
    App\Model\ModelContato,
    App\View\ViewHome,
    App\Estrutura\Principal;

class ControllerHome extends ControllerPadrao {

    protected function processPage() {
        
        $sTitle = 'Home';

        $aDadosContatos = Principal::getDadosJson(null, true);

        $sContent = ViewHome::render([
            'homeContent' => ViewHome::Table($aDadosContatos)
        ]);

        if(!isset($this->footerVars['footerContent'])) {
            
            $this->footerVars = [
                'footerContent' => ''
            ];
        };

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }

    function processDelete(){

        if(!Principal::existeContato(self::getContato())){
            return $this->processPage();
        }

        $oDadosContato = Principal::getDadosJson(self::getContato());
        $oContatoExcluir = $this->setModel($oDadosContato);
        $oContatoExcluir->destroy();
        return $this->processPage();
    }

    function setModel($oDadosContato){
        $oContato = new ModelContato();
        $oContato->setContato($oDadosContato->iContato);
        $oContato->setNome($oDadosContato->sNome);
        $oContato->setTelefone($oDadosContato->sTelefone);
        $oContato->setEmail($oDadosContato->sEmail);
        $oContato->setDataNascimento($oDadosContato->sDataNascimento);
        $oContato->setIdade($oDadosContato->sDataNascimento);
        return $oContato;
    }

    private static function getContato(){
        return intval($_GET['contato']);
    }
}
