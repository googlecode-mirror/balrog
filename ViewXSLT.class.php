<?php
require_once 'lib/Settings.class.php';
require_once 'lib/View.class.php';
class ViewXSLT extends View
{
	private $xmldoc;
	private $processor;
	public function __construct($filename)
	{
		parent::__construct($filename);
		$this->xmldoc = NULL;
		$xsltobj = new DOMDocument();
		$xsltobj->load($this->filename);
		$this->processor = new XSLTProcessor();
		$this->processor->importStylesheet($xsltobj);
	}
	/**
	 * Assigns the xml imput to the XSLT stylesheet
	 * @param $filename
	 */
	public function assign($view){
		if($view instanceof ViewXML){
			$this->xmldoc = new DOMDocument();
			$this->xmldoc->loadXML($view->show());
		}
	}
	public function show(){
		return $this->processor->transformToXML($this->xmldoc);
	}
}