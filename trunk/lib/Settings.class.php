<?php
class Settings {	
	public static function get($query){		
		$xml = new DOMDocument();
		$xml->load(CONFILE);		
		$xpath = new DOMXPath($xml);
		$result = $xpath->query('/settings/'.$query);
		return $result->item(0)->nodeValue;
	}	
}