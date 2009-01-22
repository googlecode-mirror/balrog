<?php
require_once 'lib/Path.class.php';
class View
{
    private $name;
    private $template;
    public function __construct ($name, $template = 'template.xsl')
    {
        $this->name = $name;
        $this->template = $template;
    }
    public function display ($data)
    {
        extract($data);
        ob_start();
        include Path::get_html_path($this->name . '.html');
        $xhtml = ob_get_contents();
        ob_end_clean();
        $xslDoc = new DOMDocument();
        $xslDoc->load(Path::get_inc_path($this->template));
        $xmlDoc = new DOMDocument();
        $xmlDoc->loadXML($xhtml);
        $proc = new XSLTProcessor();
        $proc->importStylesheet($xslDoc);
        echo $proc->transformToXML($xmlDoc);
    }
}