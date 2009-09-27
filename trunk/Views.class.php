<?php
require_once '../core/Path.class.php';
require_once '../core/View.class.php';
require_once '../core/ViewHTML.class.php';
require_once '../core/ViewPHP.class.php';
require_once '../core/ViewTXT.class.php';
require_once '../core/ViewXML.class.php';
require_once '../core/ViewXSLT.class.php';
class Views {
	public static function factory($filename){
		$extension = pathinfo(Path::find(Path::VIEW, $filename), PATHINFO_EXTENSION);
		switch($extension){
			case 'htm':
			case 'html':
				$ret = new ViewHTML(Path::find(Path::VIEW, $filename));
				break;
			case 'txt':
				$ret = new ViewTXT(Path::find(Path::VIEW, $filename));
				break;
			case 'xml':
				$ret = new ViewXML(Path::find(Path::VIEW, $filename));
				break;
			case 'xsl':
			case 'xslt':
				$ret = new ViewXSLT(Path::find(Path::VIEW, $filename));
				break;
			default:
				$ret = new ViewPHP(Path::find(Path::VIEW, $filename));
		}
		return $ret;
	}
}
