<?php
class Settings {
	private $xml;
	private $xpath;
	static $instance;
	private function __construct(){		
		$this->xml = new DOMDocument();
		$this->xml->load(CONFILE);		
		$this->xpath = new DOMXPath($this->xml);
		$this->xpath->registerNamespace('blrg','http://fabricademagia.com.ar/balrog');
	}
	private static function getInstance(){
		if( ! (self::$instance instanceof self) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	public static function get($query){			
		$settings = self::getInstance();		
		$result = $settings->xpath->query('/blrg:settings/'.$query);
		return $result->item(0)->nodeValue;
	}
}