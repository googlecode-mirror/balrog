<?php
class Url {
    public static function get_param($name){
        $param = isset($_REQUEST[$name]) ? $_REQUEST[$name] : NULL;
        return $param;
    }
}