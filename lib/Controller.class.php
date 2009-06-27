<?php
abstract class Controller
{
    protected $view;
    protected function setView($view)
    {
        $this->view = new View(Path::get_path($view));
    }
    protected function requestParam($name)
    {
        return isset ($_REQUEST[$name])?$_REQUEST[$name]:NULL;
    }
}