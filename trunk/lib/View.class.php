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
    }
    public function setStylesheet ($path)
    {
        $this->stylesheet = new DOMDocument();
        $this->stylesheet->load($path);
    }
    public function setView ($path)
    {
        $this->view = new DOMDocument();
        $this->view->load($path);
    }
    public function display ()
    {
        $proc = new XSLTProcessor();
        $proc->importStylesheet($this->stylesheet);
        echo $proc->transformToXML($this->view);
    }
}