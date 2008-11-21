<?php
class MyController extends Controller
{
    private $data;
    public function __construct ()
    {
        parent::Controller();
        $this->data = array();
        $this->data['javascripts'] = array();
        $this->data['stylesheets'] = array();
    }
    public function setPageTitle ($title)
    {
        $this->data['page_title'] = $title;
    }
    public function addJS ($filename)
    {
        $this->data['javascripts'][] = array(
            'src' => base_url().'system/application/js/'.$filename
        );
    }
    public function addCSS ($filename)
    {
        $this->data['stylesheets'][] = array(
            'src' => base_url().'system/application/css/'.$filename
        );
    }
    public function setContent ($view)
    {
        $this->data['content'] = $view;
    }
    public function render ()
    {
        $this->load->library('parser');
        $this->parser->parse('master', $this->data);
    }
}