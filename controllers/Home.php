<?php
require_once 'lib/Controller.class.php';
class Home extends Controller
{
    public function index ()    
    {
        $opt = new stdClass();
        $opt->value = 1;
        $opt->label = "Independiente";
        $this->_setView('xsl/html/template.xsl','xml/view1.xml');
        $this->_setData('equipos', array($opt, $opt));
        //$this->_setData('equipos', array('Independiente', 'San Lorenzo', 'Argentinos', array('Colon', 'Velez')));
        //$this->_setData('titulo', 'Gran DT');
    }
    public function process(){
        print_r($_POST);
    }
}