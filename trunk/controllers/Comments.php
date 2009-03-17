<?php
require_once 'lib/Controller.class.php';
require_once 'models/Comment.php';
class Comments extends Controller
{
    public function index ()
    {
        $this->_setView('xsl/html/template.xsl', 'xml/comments.xml');
        $comment = new Comment();
        $this->_setData('comments', $comment->getAll());
    }
    public function process(){
        print_r($_POST);
    }
}