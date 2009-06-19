<?php
require_once '../lib/XSLTController.class.php';
require_once 'models/Comment.php';
class Home extends XSLTController
{
	public function index()
	{
		$this->_setView('xml/index.xml', 'xsl/html/template.xsl');
	}
	public function process()
	{
		print_r($_POST);
		$this->index();
	}
}