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
        foreach ($this->data as $key => $value) {
            $nodes = $xpath->query("//*[@uvcms:datasource='$key']");
            $this->processData($nodes, $value);
        }
    }
    public function processData ($nodes, $value)
    {
        for ($i = 0; $i < $nodes->length; $i ++) {
            if (is_string($value)) {
                $this->processValue($nodes->item($i), $value);
            } elseif (is_array($value)) {
                $this->processSet($nodes->item($i), $value);
            }
        }
    }
    public function processSet ($node, $set)
    {
        foreach ($set as $value) {
            if (is_array($value)) {
                $subnode = new DOMElement('uvcms:dataset', NULL, 'http://www.uvcms.com/views');
                $this->processSet($subnode, $value);
                $node->appendChild($subnode);
            } else {
                $this->processValue($node, $value);
            }
        }
    }
    public function processValue ($node, $value)
    {
        $element = new DOMElement('uvcms:datavalue', $value, 'http://www.uvcms.com/views');
        $node->appendchild($element);
    }
    public function render ()
    {
        //echo $this->view->saveHTML(); exit;
        $proc = new XSLTProcessor();
        $proc->importStylesheet($this->stylesheet);
        echo $proc->transformToXML($this->view);
    }
}