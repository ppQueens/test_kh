<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09/08/2018
 * Time: 3:59 PM
 */


class Route{
    static function check_file_exists($file){
        if (file_exists($file)) return True;
        return False;
    }
    static function start(){
        $controller_name = "index";
        $action_name = "index";

        $routes = explode("/",$_SERVER["REQUEST_URI"]);


        if ($routes[1]){
            $controller_name = $routes[1];
        }

        if (isset($routes[2])){
            $action_name = $routes[2];
        }

        if ($_GET){
            reset($_GET);
            $action_name = key($_GET);
            list($controller_name,) = explode("?",$routes[1]);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $action_name = $_POST["post"];
        }

        $controller_file = "controller_".strtolower($controller_name).".php";
        $controller_path = "site/controllers/".$controller_file;

        (Route::check_file_exists($controller_path) and require_once($controller_path)) or
        (die($controller_path));


        $class_name = explode(".",$controller_file)[0];

        $controller = new $class_name();
        $action = "action_".$action_name;

        if(method_exists($controller,$action)){
            try{
                $controller->$action();
            }
            catch (Exception $e){
                print($e);
            }

        }
        else{
            Route::ErrorPage404();
        }
    }

    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'page404');
    }
}