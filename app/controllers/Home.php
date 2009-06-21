<?php
require_once '../lib/XSLTController.class.php';
require_once '../lib/ViewFactory.class.php';
class Home extends XSLTController
{
	public function index()
	{
		$view = ViewFactory::factory('php/template.php');
		$view->assign('title', 'TEST');
		$view->assign('content', $this->inicio());
		return $view;
	}
	public function inicio(){
		$view = ViewFactory::factory('php/test.php');
		$view->assign('title', 'Ferrari');
		return $view;
	}
}