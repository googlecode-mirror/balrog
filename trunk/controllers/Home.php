<?php
require_once 'lib/Controller.class.php';
class Home extends Controller
{
    public function index ()
    {
        $this->_setView('xsl/html/template.xsl','xml/view1.xml');
        $this->_setData('equipos',array('Independiente', 'San Lorenzo', 'Argentinos'));
    }
    public function process(){
        print_r($_POST);
    }
}