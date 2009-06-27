<?php
require_once '../lib/Path.class.php';
require_once '../lib/View.class.php';
require_once '../lib/ViewXSLT.class.php';
class ViewFactory{
	public static function factory($filename, $sylesheet = NULL){
		if(empty($sylesheet)){
			$ret = new View(Path::get($filename));	
		} else {			
			$ret = new ViewXSLT(Path::get($filename), Path::get($sylesheet));
		}		
		return $ret;
	}
}
