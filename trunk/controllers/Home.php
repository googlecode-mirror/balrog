<?php
require_once 'lib/Controller.class.php';
class Home extends Controller
{
    public function index ()
    {
        $this->_setView('xsl/html/template.xsl','xml/view1.xml');
    }
    public function process(){
        print_r($_POST);
    }
}