<?php
class FrontController
{
    private $controller;
    private $action;
    private $instance;
    public function __construct($controller, $action)
    {
        $this->controller = $controller?$controller:'home';
        $this->action = $action?$action:'index';
    }
    public function excecute()
    {
        require_once 'controllers/'.ucfirst($this->controller).'.php';
        $action = $this->action;
        $this->instance = new $this->controller();
        $this->instance->$action();
        $this->instance->_finish();
    }
}
