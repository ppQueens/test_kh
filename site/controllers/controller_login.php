<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09/08/2018
 * Time: 4:48 PM
 */

class Controller_Login extends Controller
{

    function __construct()
    {
        Controller::__construct("login_form.php");
    }

    function action_index()
    {
        if (!Controller_Login::is_logged()) {

            $this->data["title"] = "Доступ к своему профилю";
            Controller::action_index();
        }
        else{
            header("Location: /");
        }
    }

    function action_login()
    {
        if (isset($_POST["email"]) and isset($_POST["password"])) {
            $user = new Model_User($_POST["email"], $_POST["password"]);
            $user_row = $user->is_user_exist("email, password_hash");

            if ($user_row and $user_row["password_hash"] == hash("sha256", $user->get_data()["password_hash"])) {
                $hash = hash("sha256", time());
                setcookie("name", $user_row["full_name"]);
                setcookie("hash", $hash, time() + 60 * 60 * 24);


                $query = sprintf("UPDATE `user` SET user_hash='%s' WHERE email='%s'",
                    $hash, $user->get_data()["email"]);
                print($query);

                Db_connection::instance()->query_executor($query);

                header("Location: /");
            } else {
                $this->data["errors"]["wrong_e_p"] = "Неправильный пароль или email";
                $this->action_index();

            }

        }
    }


    public static function is_logged()
    {

        if (isset($_COOKIE["hash"])) {

            if ($user_data = (new Model_User())->is_user_exist("full_name, email, about, photo" , "user_hash",
                $_COOKIE["hash"])) {
                return $user_data;
            } else {
                setcookie("name", "", time() - 1, "/");
                setcookie("hash", "", time() - 1, "/");
            }
        }
        return false;
    }


    public function action_exit(){
        setcookie("name","",time()-1,"/");
        setcookie("hash", "", time()-1,"/");
        $this->action_index();
    }
}


