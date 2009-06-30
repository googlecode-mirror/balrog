<?php
require_once '../lib/Controller.class.php';
require_once '../lib/ViewFactory.class.php';
class Home extends Controller
{
	public function index()
	{
		$view = ViewFactory::factory('php/template.php');
		$view->assign('title', 'TEST');
		$view->assign('message', ViewFactory::factory('html/welcome.html'));
		$view->assign('content', 'Un texto');
		return $view;
	}
	public function inicio(){
		$xml = ViewFactory::factory('xml/index.xml');
		$xsl = ViewFactory::factory('xsl/html/template.xsl');
		$xsl->assign($xml);
		return $xsl;
	}
}