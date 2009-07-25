<?php
require_once 'lib/Path.class.php';
require_once 'lib/View.class.php';
require_once 'lib/ViewHTML.class.php';
require_once 'lib/ViewPHP.class.php';
require_once 'lib/ViewTXT.class.php';
require_once 'lib/ViewXML.class.php';
require_once 'lib/ViewXSLT.class.php';
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
