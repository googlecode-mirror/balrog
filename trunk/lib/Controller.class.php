<?php
require_once 'lib/Path.class.php';
require_once 'lib/View.class.php';
abstract class Controller
{
    private $view;
    public function __construct ()
    {}
    protected function _setView ($stylesheet, $view)
    {
        $this->view = new View(Path::get_path($stylesheet), Path::get_path($view));
    }
    protected function _setData ()
    {}
    public function _release ()
    {
        if(isset($this->view)){
            $this->view->display();    
        }        
    }
}