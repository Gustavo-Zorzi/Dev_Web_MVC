<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewHome extends ViewPadrao{

    static function Table($aDadosContato){

        $iRegistro = 1;
        
        $sTable = '
        <table class="table mt-0">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Email</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">Idade</th>
        <th>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
        <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
        </svg>
        </th>
        </tr>
        </thead>
        <tbody>
        '; 
        
       /*  for($iLinha = 0; $iLinha < $aDadosContato; $iLinha++){

            $oDadosContato = $aDadosContato[$iLinha];

            $sNome     = $oDadosContato->sNome;
            $sTelefone = $oDadosContato->sTelefone;
            $sEmail    = $oDadosContato->sEmail;
            $sDataNascimento = self::tratarDataNascimento($oDadosContato->sDataNascimento);
            $iIdade    = self::getIdade($sDataNascimento);

                $sTable .= 
                "
                <tr>
                    <td scope='col'>$iRegistro</td>
                    <td scope='col'>$sNome</td>
                    <td scope='col'>$sTelefone</td>
                    <td scope='col'>$sEmail</td>
                    <td scope='col'>$sDataNascimento</td>
                    <td scope='col'>$iIdade</td>
                </tr>
                ";
            $iRegistro++;    
        } */

        $sTable .= "    </tbody>
                    </table>";

        return $sTable;
    }

    static function tratarDataNascimento($sDataNascimento){

        $sDataNascimentoTratada = str_replace("-", "/", $sDataNascimento);

        return $sDataNascimentoTratada;
    }

    static function getIdade($sDataNascimento){
        $sHoje = date("Y-m-d");

        $sIdade = date_diff(date_create($sDataNascimento), date_create($sHoje));

        return $sIdade->format("%d Dias");
    }
}
