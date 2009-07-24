<?php 
class Connection {
	private $host;
	private $name;
	private $user;
	private $pass;
	private static $instance = NULL;
    /**
     * The constructor is set to private so
     * so nobody can create a new instance using new
     */
    private function __construct() {
    	$this->host = Settings::get('blrg:database/blrg:host');
		$this->name = Settings::get('blrg:database/blrg:name');
		$this->user = Settings::get('blrg:database/blrg:user');
		$this->pass = Settings::get('blrg:database/blrg:pass');		
    }   
    /**
     * Return DB instance or create intitial connection
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
     *
     * Like the constructor, we make __clone private
     * so nobody can clone the instance
     *
     */
    private function __clone() {}    
}
