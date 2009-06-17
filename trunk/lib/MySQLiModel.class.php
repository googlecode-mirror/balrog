<?php
require_once '../lib/Model.class.php';
abstract class MySQLiModel extends Model
{
	protected $conn;
	public function __construct()
	{
		$this->conn = self::getConnection();
	}
	protected static function getConnection(){
		return new mysqli(Settings::get('blrg:database/blrg:host'), Settings::get('blrg:database/blrg:user'), Settings::get('blrg:database/blrg:pass'), Settings::get('blrg:database/blrg:name'));
	}
	protected function query($sql)
	{
		return $this->conn->query($sql);
	}
	protected function getLastID()
	{
		return $this->conn->insert_id;
	}
	public function __destruct()
	{
		$this->conn->close();
	}
}
