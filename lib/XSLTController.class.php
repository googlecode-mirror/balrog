<?php
require_once ('../lib/ViewXSLT.class.php');
require_once ('../lib/Controller.class.php');
class XSLTController extends Controller
{
	protected function _setView($template, $view)
	{
		$this->view = new ViewXSLT(Path::get_path($template), Path::get_path($view));
	}
}
