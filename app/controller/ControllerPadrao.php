<?php

namespace App\Controller;

use App\View\ViewPage,
    App\View\ViewHeader,
    App\View\ViewFooter;

abstract class ControllerPadrao {

    public $headerVars = [];
    public $footerVars = [];
    protected $Session;

    
    public function render() {
        
        $sAction = $_POST['act'] ??= $_GET['act'] ??= '';

        switch ($sAction) {
            case 'insert':
                return $this->processInsert();
            case 'update':
                return $this->processUpdate();
            case 'delete':
                return $this->processDelete();
        };

        return $this->processPage();
    }
    
    private function getModel() {
        
    }

    private function setModel() {
        
    }

    protected function processInsert() {
        
    }

    protected function processUpdate() {
        
    }

    protected function processDelete() {
        
    }

    protected function processPage() {
        
    }

    protected function processWhere() {
        
    }

    protected function processLogin() {
        
    }

    protected function getHeader($aVars = []) {
        return ViewHeader::render($aVars);
    }

    protected function getFooter($aVars = []) {
        return ViewFooter::render($aVars);
    }

    protected function getPage($sTitle, $sContent) {
        $this->headerVars = [
            'headerContent' => ViewHeader::renderizaHeader()
        ];
        
        $sHeader = $this->getHeader($this->headerVars);
        $sFooter = $this->getFooter($this->footerVars);

        return ViewPage::render([
            'title' => $sTitle,
            'header' => $sHeader,
            'content' => $sContent,
            'footer' => $sFooter
        ]);
    }

}
