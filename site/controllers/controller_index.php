<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/07/2018
 * Time: 9:26 PM
 */


class Controller_Index extends Controller {

    function __construct()
    {
        Controller::__construct();
    }

    function action_index()
    {
        if($user = Controller_Login::is_logged()){
            $this->data["user"] = $user;
        }
        Controller::action_index();
    }

}
