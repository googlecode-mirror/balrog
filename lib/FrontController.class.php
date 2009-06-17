<?php
require_once '../lib/Settings.class.php';
class FrontController
{
	private $controller;
	private $action;
	private $instance;
	public function __construct($controller, $action)
	{
		$this->controller = $controller ? $controller : Settings::get('blrg:defaults/blrg:controller');
		$this->action = $action ? $action : Settings::get('blrg:defaults/blrg:action');
	}
	public function excecute()
	{
		require_once 'controllers/'.ucfirst($this->controller).'.php';
		$action = $this->action;
		$this->instance = new $this->controller();
		$this->instance->$action();
		$this->instance->_release();
	}
}
