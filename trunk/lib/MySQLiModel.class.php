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
		return new mysqli(self::DBHOST, self::DBUSER, self::DBPASS, self::DBNAME);
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
