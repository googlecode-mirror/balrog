<?php
require_once '../lib/View.class.php';
require_once '../lib/Path.class.php';
abstract class Controller
{
	protected $data;
    protected  $view;
    public function __construct(){
    	$this->data = array();
    }
    protected function _setView($view)
    {    	
        $this->view = new View(Path::get_path($view));
    }
    protected function _setData($key, $value)
    {
        $this->data[$key] = $value;
    }
    protected function _getParam($name)
    {
        return isset ($_REQUEST[$name])?$_REQUEST[$name]:NULL;
    }
    public function _release()
    {    	    	
        if ( isset ($this->view))
        {
        	$this->view->fill($this->data);
            $this->view->process();
            $this->view->render();
        }
    }
}
