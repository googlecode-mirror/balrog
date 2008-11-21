<?php
class Inicio extends MyController
{
    public function __construct ()
    {
        parent::Controller();
    }
    public function index ()
    {
        $this->setPageTitle('Balrog - Inicio');
        $this->addJS('jquery-1.2.6.pack.js');
        $this->addCSS('main.css');
        $this->addJS('inicio.js');
        $this->addCSS('inicio.css');
        $this->setContent($this->load->view('inicio', NULL, TRUE));
        $this->render();
    }
}