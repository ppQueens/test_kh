<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/08/2018
 * Time: 10:03 AM
 */

class Controller_Profile extends Controller
{

    function __construct()
    {
        Controller::__construct("self_profile.php");
    }

    function action_index()
    {
        if ($logged_user = Controller_Login::is_logged()) {
            if (!isset($this->data["title"])){
                $this->data["title"] = "Мой профиль";
            }

            $this->data["user"] = $logged_user;
            Controller::action_index();
        } else {
            header("Location: /login");
        }

    }

    function action_user()
    {
        $this->change_view("user_profile.php");
        if (Controller_Login::is_logged() and $_GET["user"] and $user = (new Model_User())->is_user_exist("all", "email", $_GET["user"])) {
            $this->data["user_title"] = "Профиль пользователя " . $user["full_name"];
            $this->data["user_profile"] = $user;
        }
        $this->action_index();
    }

    ###########todo: валидация с токеном
    ##########todo: попытка сохранить те же данные (валидация на клиенте)

    function action_update()
    {
        if ($user_logged = Controller_Login::is_logged()) {

            $user_model = new Model_User($_POST["email"], null,
                $_POST["full_name"], $_POST["about"]);

            if ($_FILES["image"]["tmp_name"]) {

                $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $user_model->set_data("photo", "{$imgData}");
            }
            $user_model->update_data();
        }
        header("Location: /profile");
    }

    function action_all(){
        if ($user_logged = Controller_Login::is_logged()) {
//
            $query = "SELECT email, photo FROM `user`";
            $result = Db_connection::instance()->query_executor($query);

            $this->change_view("profiles_list.php");
            $this->data["title"] = "Профили всех пользователей";
            $this->data["all"] = $result;
            $this->action_index();
        }
        else{
            header("Location: /Login");
        }

    }
}
