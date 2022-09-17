<?php
namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\View404;

class Controller404 extends ControllerPadrao
{
    protected function processPage()
    {
        $sTitle = 'Page Not found';

        $sContent = View404::render([
            '404Content' => '<h1>OOPS! 404 PAGINA NÃO Encontrada!</h1>'
        ]);

        $this->footerVars = [
            'footerContent' => ''
        ];

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
}
