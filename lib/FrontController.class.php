<?php
require_once '../lib/Settings.class.php';
class FrontController
{
    private $controller;
    private $action;
    static $instance;
    public function __construct()
    {
        $this->controller = ! empty($_REQUEST['c'])?$_REQUEST['c']:Settings::get('blrg:defaults/blrg:controller');
        $this->action = ! empty($_REQUEST['a'])?$_REQUEST['a']:Settings::get('blrg:defaults/blrg:action');
        require_once 'controllers/'.ucfirst($this->controller).'.php';
    }
    public function getController()
    {
        return $this->controller;
    }
    public function getAction()
    {
        return $this->action;
    }

    private static function getInstance()
    {
        if (!(self::$instance instanceof self))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public static function go()
    {
        $instance = self::getInstance();
        $controller = $instance->getController();
        $controller = new $controller();
        $action = $instance->getAction();
        echo $controller->$action();
    }
}