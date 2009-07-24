<?php 
class Connection {
    private $host;
    private $name;
    private $user;
    private $pass;
    private static $instance = NULL;
    /**
     * The constructor is set to private so nobody can create a new instance of the class
     */
    private function __construct() {
        $this->host = Settings::get('blrg:database/blrg:host');
        $this->name = Settings::get('blrg:database/blrg:name');
        $this->user = Settings::get('blrg:database/blrg:user');
        $this->pass = Settings::get('blrg:database/blrg:pass');
    }
    /**
     * Singleton method that requests a unique instance of the class
     *
     * @return object (PDO)
     * @access public
     */
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new PDO("mysql:host='localhost';dbname='animals'", 'username', 'password');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
    /**
     * This magic method is set as private so nobody can clone the instance
     */
    private function __clone() {}
}
