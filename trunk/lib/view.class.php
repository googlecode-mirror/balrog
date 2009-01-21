<?php
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
        include 'views/html/' . $this->name . '.html';
        ob_end_flush();
    }    
}