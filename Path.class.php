<?php
require_once 'lib/Settings.class.php';
class Path
{
    public static function find($type, $filename)
    {
    	switch($type){
    		case 'view':
				$relpath = 'views';
				break;
			default:
				$relpath = 'files';
				break;
    	}
        return sprintf('%1$s%2$s%3$s%2$s%4$s', Settings::get('blrg:dirroot'), DIRECTORY_SEPARATOR, $relpath, $filename);
    }
}
