<?php
class View
{
    private $stylesheet;
    private $view;
    private $data;
    public function __construct ($stylesheet, $view)
    {
        $this->setStylesheet($stylesheet);
        $this->setView($view);
		$this->data = array();
    }
    private function setStylesheet ($path)
    {
        $this->stylesheet = new DOMDocument();
        $this->stylesheet->load($path);
    }
    private function setView ($path)
    {
        $this->view = new DOMDocument();
        $this->view->load($path);
    }
    public function setData ($key, $value)
    {
        $this->data[$key] = $value;
    }	
	public function process(){
		$xpath = new DOMXPath($this->view);		
		foreach($this->data as $key => $value) {
			$elements = $xpath->query("//*[@datasource='$key']");
			if(is_array($value)){
				$this->processSet($elements, $value);
			} else {
				$this->processValue($elements, $value);
			}
		}
	}
	public function processSet($elements, $set){
		foreach($set as $value){
			if(is_array($value)){
				$this->processSet($elements, $value);
			} else {
				$this->processValue($elements, $value);
			}
		}	
	}
	public function processValue($elements, $value){
	}
    public function render ()
    {
        $proc = new XSLTProcessor();
        $proc->importStylesheet($this->stylesheet);
        echo $proc->transformToXML($this->view);
    }
}