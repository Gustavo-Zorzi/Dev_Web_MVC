<?php

/**
 * Rederiza o conteúdo da página solicitada
 * @param string $sPage
 * @return string
 */
function render($sPage)
{
    switch ($sPage) {
        case 'home':
            return (new App\Controller\ControllerHome)->render();
        case 'register':
            return (new App\Controller\ControllerRegister)->render();
    }

    return (new App\Controller\Controller404)->render();
}
