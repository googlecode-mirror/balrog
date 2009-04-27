<?php
require_once '../lib/XSLTController.class.php';
require_once 'models/Comment.php';
class Comments extends XSLTController
{
    public function index()
    {
        $this->_setView('xsl/html/template.xsl', 'xml/comments.xml');
    }
    public function add()
    {
        $this->_setView('xsl/html/template.xsl', 'xml/comment.form.xml');
    }
    public function edit()
    {
        $this->_setView('xsl/html/template.xsl', 'xml/comment.form.xml');
    }
    public function detail()
    {

    }
    public function process()
    {
        $comment = new Comment($this->_getParam('id'));
        $comment->setTitle($this->_getParam('title'));
        $comment->setBody($this->_getParam('body'));
        $comment->save();
        $this->index();
    }
}
