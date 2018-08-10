<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26/07/2018
 * Time: 6:58 PM
 */

require_once("config.ini.php");

class Db_connection
{
    private $USER = USERNAME;
    private $PASS = PASSWORD;
    private $DB = DATABASE;
    private $HOST = HOST;
    private static $DB_CONNECT;

    private static $instance;

    public static function instance()
    {

        if (self::$instance === null) {
            self::$instance = new Db_connection();
        }
        return self::$instance;
    }

    private function __construct()
    {
        if (!self::$DB_CONNECT) {


            if ($this->USER and $this->PASS and $this->DB and $this->HOST) {

                $dsn = "mysql:host=" . $this->HOST . ";dbname=" . $this->DB;
                self::$DB_CONNECT = new PDO($dsn, $this->USER, $this->PASS);
            } else {
                throw new Exception("At least one of required params for db connection is missed!");
            }

        }
    }


    public function get_connect()
    {
        return self::$DB_CONNECT;
    }

    public function close_connect()
    {
        self::$instance = null;
        self::$DB_CONNECT = null;
    }


    public function __clone()
    {
        throw new Exception("Only one instance is allowed");
    }


    public function query_executor($query)
    {
        $res = self::$instance->get_connect()->query($query);
        if (!$res) {
            return $res;
        }

        $full_result = array();
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            array_push($full_result, $row);

//            file_put_contents("some_image.jpg",$row["photo"]);
        }
        #return true
//        if (!$full_result) return true;
        return count($full_result) == 1 ? $full_result[0] : $full_result;
    }

}