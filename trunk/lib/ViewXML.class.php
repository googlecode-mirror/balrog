<?php
require_once '../lib/View.class.php';
class ViewXML extends View{	
	protected $domdoc;
	private $stylesheet;
	/**
	 * Contructor for ViewXML
	 * @param $filename
	 * @todo Process every DOMProcessingInstruction
	 */
	public function __construct($filename){
		parent::__construct($filename);
		$this->domdoc = new DOMDocument();
		$this->domdoc->load($this->filename);		
		$this->stylesheet = $this->domdoc->firstChild->target == 'xml-stylesheet' ? $this->stripValue($this->domdoc->firstChild->data, 'href') : NULL;		
	}
	public function show(){
		header('Content-Type: text/xml; charset=utf-8');
		return $this->domdoc->saveXML();
	}
	public function process()
	{		
		$proc = new XSLTProcessor();
		$proc->importStylesheet($this->stylesheet);
		return $proc->transformToXML($this->domdoc);
	}
	private function stripValue($string, $attribute){
		preg_match('/href=["\']?([^"\' ]*)["\' ]/is', $string, $matches);
		return $matches ? substr($matches[0], strpos($matches[0], '"')+1, -1) : NULL;		
	}
}