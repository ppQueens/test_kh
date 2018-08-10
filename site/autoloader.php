<?php


class Auto_Loader{

    private $path;
    function __construct($path) {
        $this->path = $path;
        spl_autoload_register(array($this, 'load'));
    }

    public function load( $file )
    {
//        print($this->path);
        if (is_file($this->path . '/' . $file . '.php')) {
            require_once( $this->path . '/' . $file . '.php' );
        }
    }
}