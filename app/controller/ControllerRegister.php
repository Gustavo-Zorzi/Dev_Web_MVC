<?php

namespace App\Controller;

use App\Controller\ControllerPadrao,
    App\View\ViewRegister;
use App\Estrutura\Principal;

class ControllerRegister extends ControllerPadrao {

    const UPDATE = 'update';

    protected function processPage() {
        
        $sTitle = 'Cadastro Contatos';

        $sLegenda = self::getAcao() === self::UPDATE ? 'Atualizar Contato' : 'Cadastro Contatos';

        $sContent = ViewRegister::render([
            'registerLegend' => $sLegenda
        ]);

        if (!isset($this->footerVars['footerContent'])) {
            
            $this->footerVars = [
                'footerContent' => ''
            ];
            
        };

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }

    function processUpdate(){
        return $this->processPage();
    }

    private static function getAcao(){
        return $_GET['act'];
    }

    private static function getContato(){
        return $_GET['contato'];
    }
}
