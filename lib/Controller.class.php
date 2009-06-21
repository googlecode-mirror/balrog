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
    public function _release()
    {
        if ( isset ($this->view))
        {
            $this->view->fill($this->data);
            $this->view->process();
            $this->view->render();
        }
    }
}
