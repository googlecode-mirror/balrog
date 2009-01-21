<?php
abstract class Controller {
    protected function display($viewname){
        ob_start();
        include 'views/'.$viewname;
        ob_end_flush();
    }
}