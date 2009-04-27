<?php
require_once ('../lib/XSLTView.class.php');
require_once ('../lib/Controller.class.php');
class XSLTController extends Controller
{
	protected function _setView($template, $view)
	{
		$this->view = new XSLTView(Path::get_path($template), Path::get_path($view));
	}
}
