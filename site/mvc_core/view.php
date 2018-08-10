<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09/08/2018
 * Time: 3:51 PM
 */

class View {

    private $main_template;
    public $content_template;

    function __construct($content, $template)
    {
        $this->content_template = $content;
        $this->main_template = $template;
    }

    function generate($data = null, $message = null){
        if ($this->main_template) {
            include 'site/views/'.$this->main_template;
        }
    }



}