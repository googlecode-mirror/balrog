<?php
require_once '../lib/View.class.php';
class ViewXML extends View{
	protected $domdoc;
	/**
	 * Contructor for ViewXML
	 * @param $filename
	 * @todo Process every DOMProcessingInstruction
	 */
	public function __construct($filename){
		parent::__construct($filename);
		$this->domdoc = new DOMDocument();
		$this->domdoc->load($this->filename);		
	}
	public function show(){
		return $this->domdoc->saveXML();
	}
}