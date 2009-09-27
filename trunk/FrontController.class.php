<?php 
require_once '../core/Settings.class.php';
class FrontController {
    private $controller;
    private $action;
    static $instance;
    /**
     * The constructor sets the controller and action names. In case
     * one or both were not provided, default settings are used.
     */
    public function __construct() {
        $this->controller = ! empty($_REQUEST['c']) ? $_REQUEST['c'] : Settings::get('blrg:defaults/blrg:controller');
        $this->action = ! empty($_REQUEST['a']) ? $_REQUEST['a'] : Settings::get('blrg:defaults/blrg:action');
    }
    /**
     * Singleton method that returns a unique instance of the class.
     *
     * @return FrontController
     */
    private static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * Automatically loads the requested controller.
     *
     * @param string $controller
     */
    public static function autoload($controller) {
        require_once '../controllers/'.ucfirst($controller).'.php';
    }
    /**
     * Invokes a controller and excecutes a given action.
     *
     * @param object $controller
     * @param object $action
     * @return View/string
     */
    public static function invoke($controller, $action) {
        self::autoload($controller);
        $controller = new $controller();
        return $controller->$action();
    }
    /**
     * FrontController entry point. The app starts here.
     */
    public static function go() {
        $instance = self::getInstance();
        $controller = $instance->getController();
        $action = $instance->getAction();
        echo self::invoke($controller, $action);
    }
    /**
     * Getter for $this->controller
     *
     * @return string
     */
    public function getController() {
        return $this->controller;
    }
    /**
     * Getter for $this->action
     *
     * @return string
     */
    public function getAction() {
        return $this->action;
    }
}
