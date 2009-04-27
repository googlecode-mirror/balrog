<?php
require_once '../lib/XSLTController.class.php';
require_once 'models/Comment.php';
class Home extends XSLTController
{
    public function index()
    {
        $this->_setView('xsl/html/template.xsl', 'xml/index.xml');
    }
    public function process()
    {
        print_r($_POST);
        $this->index();
    }
}
