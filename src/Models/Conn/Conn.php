<?php

namespace App\Models\Conn;

class Conn{
    private static $dbname = '';
    private static $dbhost = '';
    private static $dbuser = '';
    private static $dbpass = '';
    private static $connection = null;

    private static function setConn(){
        try{
            self::$connection = new \PDO("mysql:dbname=".self::$dbname.";host=".self::$dbhost, self::$dbuser, self::$dbpass, 
            array(
              \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
              \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
        }catch(\PDOException $e){
            die($e->getMessage());
        }
        return self::$connection;
    }

    public function getConnection(){
        return self::setConn();
    }
}