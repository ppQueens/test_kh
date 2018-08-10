<?php

class Controller {

    public $model;
    public $view;
    public $content_template;
    public $main_template;
    protected $data;

    public function __construct($content_template=null, $main_template=null)
    {
        if(!$main_template){
            $this->main_template = "main.php";
        }
        $this->view = new View($content_template, $this->main_template);

    }

    public function action_index()
    {
        $this->view->generate($this->data);
    }

    public function change_view($content_template){
        $this->view = new View($content_template, $this->main_template);
    }


}