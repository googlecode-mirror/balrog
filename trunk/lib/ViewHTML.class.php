<?php
require_once '../lib/View.class.php';
class ViewHTML extends View {
	private $domdoc;
	public function __construct($filename){
		parent::__construct($filename);
		$this->domdoc = new DOMDocument();
		$this->domdoc->loadHTMLfile($this->filename);
	}
	public function show(){
		return $this->domdoc->saveHTML();
	}
}