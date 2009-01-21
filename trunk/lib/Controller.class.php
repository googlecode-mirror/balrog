<?php
require_once 'lib/View.class.php';
abstract class Controller
{
    private $view;
    public function _finish ()
    {
        if(isset($this->view))
        {
            $this->view->display();
        }
    }
    protected function _setView ($viewname)
    {
        $this->view = new View($viewname);
    }
}