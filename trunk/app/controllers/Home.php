<?php
require_once '../lib/XSLTController.class.php';
require_once '../lib/ViewFactory.class.php';
class Home extends XSLTController
{
	public function index()
	{
		$view = ViewFactory::factory('php/template.php');
		$view->assign('title', 'TEST');
		$view->assign('message', ViewFactory::factory('html/welcome.html'));
		$view->assign('content', $this->inicio());
		return $view;
	}
	public function inicio(){
		$view = ViewFactory::factory('php/test.php');
		$view->assign('title', 'Ferrari');
		return $view;
	}
	public function form(){
		return ViewFactory::factory('xml/index.xml','xsl/html/template.xsl');
	}
}