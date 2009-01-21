<?php
require_once 'lib/View.class.php';
abstract class Controller
{
	private $data;
    private $view;
	public function __construct(){
		$this->data = array();
	}
    public function _finish ()
    {
        if(isset($this->view))
        {
            $this->view->display($this->data);
        }
    }
    protected function _setView ($viewname)
    {
        $this->view = new View($viewname);
    }
	protected function _setData($key, $value){
		$this->data[$key] = $value;
	}
}