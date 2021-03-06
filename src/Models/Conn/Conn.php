<?php

namespace App\Models\Conn;

class Conn{
    private static $dbname = DB_NAME;
    private static $dbhost = DB_HOST;
    private static $dbuser = DB_USER;
    private static $dbpass = DB_PASS;
    private static $connection = null;

    private static function setConn(){
        try{
            self::$connection = new \PDO("mysql:dbname=".self::$dbname.";host=".self::$dbhost, self::$dbuser, self::$dbpass, 
            array(
              \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
              \PDO::ATTR_EMULATE_PREPARES => false,
              \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
        }catch(\Exception $e){
            die($e->getMessage());
        }
        return self::$connection;
    }

    public function getConnection(){
        return self::setConn();
    }
}