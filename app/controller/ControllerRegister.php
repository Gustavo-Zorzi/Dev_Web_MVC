<?php

namespace App\Controller;

use App\Controller\ControllerPadrao,
    App\View\ViewRegister;

class ControllerRegister extends ControllerPadrao {

    protected function processPage() {
        
        $sTitle = 'Cadastro Contatos';

        $sContent = ViewRegister::render([
            'registerContent' => ''
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
}
