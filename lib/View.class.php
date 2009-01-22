<?php
require_once 'lib/Path.class.php';
class View
{
    private $name;
    public function __construct ($name)
    {
        $this->name = $name;
    }
    public function display ($data)
    {
        extract($data);
        ob_start();
        include Path::get_html_path($this->name . '.html');
        ob_end_flush();
    }
}