<?php
require_once 'lib/Path.class.php';
class View
{
    private $data;
    private $template;
    private $theme;
    public function __construct ()
    {}
    public function display ()
    {
        $proc = new XSLTProcessor();
        $proc->importStylesheet($this->template);
        echo $proc->transformToXML($this->dataToXML());
    }
    public function setData ($key, $value)
    {}
    public function setTemplate ($path)
    {
        $this->template = new DOMDocument();
        $this->template->load(Path::get_inc_path($path));
    }
    public function setTheme ()
    {}
    private function dataToXML ()
    {
        $xml = new DOMDocument();
        $xml->createElement('content');
        foreach ($this->data as $element) {}
        return $xml;
    }
}