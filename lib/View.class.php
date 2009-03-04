<?php
require_once 'lib/Path.class.php';
class View
{    
    private $data;
    private $template;
    private $theme;
    public function __construct ($template, $theme = 'template.xsl')
    {
        $this->template = $template;
        $this->theme = $theme;
    }
    public function display ($data)
    {
        extract($data);
        ob_start();
        include Path::get_html_path($this->name . '.html');
        $xhtml = ob_get_contents();
        ob_end_clean();
        $proc = new XSLTProcessor();
        $xslDoc = new DOMDocument();
        $xslDoc->load(Path::get_inc_path($this->template));
        $proc->importStylesheet($xslDoc);
        $xmlDoc = new DOMDocument();
        $xmlDoc->loadXML($xhtml);
        echo $proc->transformToXML($xmlDoc);
    }
    public function setData($key, $value){
        
    }
    public function setTemplate(){
        
    }
    public function setTheme(){
        
    }
    private function dataToXML(){
        
    }
}