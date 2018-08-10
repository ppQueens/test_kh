<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09/08/2018
 * Time: 4:48 PM
 */

class Controller_Registration extends Controller
{

    function __construct()
    {
        Controller::__construct("register_form.php");
    }

    function action_index()
    {
        if(!Controller_Login::is_logged()){
            $this->data["title"] = "Регистрация нового пользователя";
            Controller::action_index();
        }
        else{
            header("Location: /profile");
        }

    }


    function action_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $empty_field = "Это поле обязательно для заполнения";
            $this->data["errors"] = [];

            if (empty($_POST["full_name"])) {
                $this->data["errors"]["full_name"] = $empty_field;
            }

            if (empty($_POST["email"])) {
                $this->data["errors"]["email"] = $empty_field;
            }

            if (empty($_POST["password"])) {
                $this->data["errors"]["password"] = $empty_field;
            }

            if (empty($_POST["password2"])) {
                $this->data["errors"]["password2"] = $empty_field;
            }
            if ($_POST["password"] != $_POST["password2"]) {
                $this->data["errors"]["different_password"] = "Пароли не совпадают";
            }


            if (empty($this->data["errors"])) {

                $user_model = new Model_User($_POST["email"], hash("sha256",$_POST['password']),
                    $_POST["full_name"],$_POST["about"]);


                if(isset($_FILES["image"])){

                    $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                    $user_model->set_data("photo","{$imgData}");
                }

                if (!$user_model->is_user_exist()) {
                    try {
                        $user_model->save_to_db();
                        print("<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>");
                        header("Location: /login");
                    } catch (Exception $e) {
                        print($e);
                    }
                } else {
                    #throw new Exception("User is already exists");
                    $this->data["errors"]["exist"] = "Пользователь с таким email уже существует";
                    $this->action_index();
                }
            }
            else{
                $this->action_index();
            }
        }

    }
}


