<?php
require_once '../lib/Path.class.php';
require_once '../lib/View.class.php';
require_once '../lib/ViewXSLT.class.php';
class ViewFactory{
	public static function factory($filename){
		switch($type){
			default:
				$ret = new View(Path::get($filename));
				break;
		}
		return $ret;
	}
}
