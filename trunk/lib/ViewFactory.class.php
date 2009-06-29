<?php
require_once '../lib/Path.class.php';
require_once '../lib/View.class.php';
require_once '../lib/ViewPHP.class.php';
require_once '../lib/ViewXML.class.php';
require_once '../lib/ViewXSLT.class.php';
require_once '../lib/ViewHTML.class.php';
class ViewFactory{
	public static function factory($filename){
		$extension = pathinfo(Path::get($filename), PATHINFO_EXTENSION);		
		switch($extension){
			case 'xml':
				$ret = new ViewXML(Path::get($filename));
				break;
			case 'xsl':
			case 'xslt':
				$ret = new ViewXSLT(Path::get($filename));
				break;
			case 'htm':
			case 'html':
				$ret = new ViewHTML(Path::get($filename));
				break;				
			default:
				$ret = new ViewPHP(Path::get($filename));
		}
		return $ret;
	}
}
