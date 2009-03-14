<?php
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
    public function process ()
    {
        $xpath = new DOMXPath($this->view);
        foreach ($this->data as $key => $item) {
            $nodes = $xpath->query("//*[@uvcms:datasource='$key']");
            $this->processData($nodes, $item);
        }
    }
    public function processData ($nodes, $item)
    {
        for ($i = 0; $i < $nodes->length; $i ++) {
            if (is_string($item)) {
                $this->processValue($nodes->item($i), $item);
            } elseif (is_array($item)) {
                $this->processSet($nodes->item($i), $item);
            }
        }
    }
    public function processSet ($node, $set)
    {
        foreach ($set as $value => $item) {
            if (is_array($item)) {
                $subnode = new DOMElement('uvcms:dataset', NULL, 'http://www.uvcms.com/views');
                $this->processSet($subnode, $item);
                $node->appendChild($subnode);
            } else {
                $this->processValue($node, $item, $value);
            }
        }
    }
    public function processValue ($node, $item, $value)
    {
        $element = new DOMElement('uvcms:dataitem', $item, 'http://www.uvcms.com/views');		
        $node->appendchild($element);		
		$element->setAttribute('value', $value);
    }
    public function render ()
    {
        //echo $this->view->saveHTML(); exit;
        $proc = new XSLTProcessor();
        $proc->importStylesheet($this->stylesheet);
        echo $proc->transformToXML($this->view);
    }
}