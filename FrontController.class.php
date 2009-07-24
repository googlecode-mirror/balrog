<?php
require_once '../lib/Settings.class.php';
class FrontController
{
	private $controller;
	private $action;
	static $instance;
	public function __construct()
	{
		$this->controller = ! empty($_REQUEST['c'])?$_REQUEST['c']:Settings::get('blrg:defaults/blrg:controller');
		$this->action = ! empty($_REQUEST['a'])?$_REQUEST['a']:Settings::get('blrg:defaults/blrg:action');
	}
	public function getController()
	{
		return $this->controller;
	}
	public function getAction()
	{
		return $this->action;
	}

	private static function getInstance()
	{
		if (!(self::$instance instanceof self))
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
	public static function autoload($controller)
	{
		require_once 'controllers/'.ucfirst($controller).'.php';
	}
	public static function invoke($controller, $action)
	{
		self::autoload($controller);
		$controller = new $controller();
		return $controller->$action();
	}
	public static function go()
	{
		$instance = self::getInstance();
		$controller = $instance->getController();
		$action = $instance->getAction();
		echo self::invoke($controller, $action);
	}
}