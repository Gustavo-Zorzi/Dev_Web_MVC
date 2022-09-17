<?php

namespace App\Controller;

use App\Controller\ControllerPadrao,
    App\Model\ModelContato,
    App\View\ViewHome,
    App\Model\ModelPadrao;

class ControllerHome extends ControllerPadrao {

    protected function processPage() {
        
        $sTitle = 'Home';

        $aDadosContatos = ModelContato::getDadosJson();

        $sContent = ViewHome::render([
            'homeContent' => ViewHome::Table($aDadosContatos)
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
