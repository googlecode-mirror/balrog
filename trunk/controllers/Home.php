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
    }
    public function process(){
        print_r($_POST);
    }
}