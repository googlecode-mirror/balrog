<?php
require_once '../lib/Controller.interface.php';
require_once '../lib/Views.class.php';
class Home implements IController
{
	public function index()
	{
		$view = Views::factory('php/template.php');
		$view->assign('title', 'TEST');
		$view->assign('message', 'My message...');
		return $view;
	}
	public function inicio(){		
		$xml = Views::factory('xml/index.xml');
		$xsl = Views::factory('xsl/html/template.xsl');
		$xsl->assign($xml);
		return $xsl;
	}
}