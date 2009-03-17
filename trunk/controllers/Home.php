<?php
require_once 'lib/Controller.class.php';
require_once 'models/Comment.php';
class Home extends Controller
{
    public function index ()
    {
        $this->_setView('xsl/html/template.xsl', 'xml/index.xml');        
    }
    public function process(){
        print_r($_POST);
        $this->index();
    }
}