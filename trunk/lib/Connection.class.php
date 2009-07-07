<?php
class Connection {
	private $db;
	static $_instance;
	private function __construct() {
		$this->db = new mysqli(Settings::get('blrg:database/blrg:host'), Settings::get('blrg:database/blrg:user'), Settings::get('blrg:database/blrg:pass'), Settings::get('blrg:database/blrg:name'));
	}
	private function __clone() {} // Evitar que se clone el objeto.
	public static function getInstance() {
		if( ! (self::$_instance instanceof self) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	public function query($sql) {
		return $this->db->query($sql);
	}
}