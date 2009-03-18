<?php
require_once 'lib/Path.class.php';
require_once 'lib/View.class.php';
abstract class Controller
{
    private $view;
    public function __construct ()
    {
        $this->data = array();
    }
    protected function _setView ($stylesheet, $view)
    {
        $this->view = new View(Path::get_path($stylesheet), Path::get_path($view));
    }
    protected function _setData ($key, $value)
    {
        $this->view->setData($key, $value);
    }
    protected function _getParam($name){
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : NULL;
    }
    public function _release ()
    {
        if(isset($this->view)){
            $this->view->process();
            $this->view->render();
        }
    }
}