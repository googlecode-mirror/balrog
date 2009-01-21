<?php
class Url
{
    public static function get_param($name)
    {
        $param = isset ($_REQUEST[$name])?$_REQUEST[$name]:NULL;
        return $param;
    }
    public static function get_url($c, $a)
    {
        return '?'.http_build_query( array ('c'=>$c, 'a'=>$a));
    }
}
