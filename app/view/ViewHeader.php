<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewHeader extends ViewPadrao{

    static function renderizaHeader(){
        return '<div class="container">
                    <a class="navbar-brand collapse navbar-collapse nav-link" href="index.php?pg=home">Agenda de Contatos</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                        <a class="nav-link" href="index.php?pg=register">Cadastro de Contatos</a>
                        </li>
                    </ul>
                    </div>
                </div>';
    }

}
