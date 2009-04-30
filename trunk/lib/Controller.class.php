<?php
require_once '../lib/View.class.php';
require_once '../lib/Path.class.php';
abstract class Controller implements Config
{	
	protected $view;
	public function __construct()
	{}
	protected function _setView($view)
	{
		$this->view = new View(Path::get_path($view));
	}
	protected function _setData($key, $value)
	{
		$this->view->setData($key, $value);
	}
	protected function _getParam($name)
	{
		return isset ($_REQUEST[$name])?$_REQUEST[$name]:NULL;
	}
	public function _release()
	{		
		if ( isset ($this->view))		
		{			
			$this->view->process();
			$this->view->render();
		}
	}
}