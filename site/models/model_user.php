<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09/08/2018
 * Time: 5:44 PM
 */


class Model_User extends Model
{


    function __construct($email = null, $password = null, $full_name = null, $about = null, $photo = null)
    {

        $this->user["full_name"] = $full_name;
        $this->user["email"] = $email;
        $this->user["password_hash"] = $password;
        $this->user["about"] = $about;
        $this->user["photo"] = $photo;

    }

    public function is_user_exist($take_this_field = "*", $clause = "email", $clause_value = null)
    {

        $take_this_field = $take_this_field == "all" ? "*" : $take_this_field;
        $f = sprintf("%s", $take_this_field);
        $c = sprintf("%s = '%s'", $clause, $clause_value == null ? $this->user["email"] : $clause_value);
        $query_format = sprintf("SELECT  %s FROM `user` WHERE %s", $f, $c);

        return Db_connection::instance()->query_executor($query_format);

    }

    public function save_to_db($table = "user", $field_value = "user property")
    {
        Model::save_to_db($table, $field_value);
    }


    public function update_data($clause="email")
    {
        $query = "UPDATE `user` SET `%s`='%s' WHERE $clause='%s'";
        foreach ($this->user as $key => $value){
            if ($value){
                Db_connection::instance()->query_executor(sprintf($query,$key,$value,$this->user[$clause]));
            }

        }

    }


    public function get_data()
    {
        return $this->user;
    }

    public function set_data($field, $data)
    {
        $this->user[$field] = $data;
    }
}