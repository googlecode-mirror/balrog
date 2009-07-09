<?php
require_once '../lib/Controller.interface.php';
require_once '../lib/ViewFactory.class.php';
class Home implements IController
{
	public function index()
	{
		$view = ViewFactory::factory('php/template.php');
		$view->assign('title', 'TEST');
		$view->assign('message', 'HOLA');
		return $view;
	}
	public function inicio(){
		$xml = ViewFactory::factory('xml/index.xml');
		$xsl = ViewFactory::factory('xsl/html/template.xsl');
		$xsl->assign($xml);
		return $xsl;
	}
}