<?php 
require_once '../core/Settings.class.php';
class Path {
    const FILE = 0;
    const VIEW = 1;
    const CONTROLLER = 2;
    const MODEL = 3;
    public static function find($type, $filename) {
        switch ($type) {
            case self::VIEW:
                $relpath = 'views';
                break;
            case self::CONTROLLER:
                $relpath = 'controllers';
                break;
            default:
                $relpath = 'files';
        }
        return sprintf('%1$s%2$s%3$s%2$s%4$s', Settings::get('blrg:dirroot'), DIRECTORY_SEPARATOR, $relpath, $filename);
    }
}
