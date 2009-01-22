<?php
require_once 'lib/Config.class.php';
class Url implements Config
{
    public static function get_param ($name)
    {
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : NULL;
    }
    public static function get_url ($c, $a)
    {
        return Url::WWWROOT . '?' . http_build_query(array(
            'c' => $c, 
            'a' => $a
        ));
    }
    public static function get_js_url ($filename)
    {
        return Url::WWWROOT . '/views/js/' . $filename;
    }
    public static function get_css_url ($filename)
    {
        return Url::WWWROOT . '/views/css/' . $filename;
    }
    public static function get_html_url($filename){
        return Url::WWWROOT . '/views/html/' . $filename;
    }
}