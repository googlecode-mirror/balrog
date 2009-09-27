<?php 
class Session {
    public static function get($key) {
        session_start();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : NULL;
    }
    public static function set($key, $value) {
        if ( empty(session_id())) {
            session_start();
        }
        $_SESSION[$key] = $value;
    }
}
