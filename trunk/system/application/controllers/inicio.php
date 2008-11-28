<?php
class Inicio extends MyController
{
    public function __construct ()
    {
        parent::Controller();
    }
    public function index ()
    {
        $this->setPageTitle('Inicio');
        $this->addJS('jquery-1.2.6.pack.js');
        $this->addCSS('main.css');
        $this->addJS('inicio.js');
        $this->addCSS('inicio.css');
        $this->setContentView('inicio');
        $this->render('simple');
    }
    public function submit ()
    {
        if ($_POST['op'] == 'Si') {
            $this->setPageTitle('Confirmado');
            $this->setContentView('confirma');
        } elseif ($_POST['op'] == 'No') {
            $this->setPageTitle('Refutado');
            $this->setContentView('niega');
        }
        $this->render('simple');
    }
}