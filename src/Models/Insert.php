<?php

namespace App\Models;
use App\Models\Conn\Conn;

class Insert extends Conn{
    private $connection;
    private $sql;
    private $query;
    private $results;
    function __construct(){
        $this->connection = $this->getConnection();
    }

    function saveProduct($name){
        
    }

    function saveTag($name){
        $this->sql = "
            INSERT INTO tag (name)
            VALUES(:name)
        ";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->bindParam(':name', $name, \PDO::PARAM_STR);
            $this->results = $this->query->execute();
        }catch(\PDOException $e){
            die($e->getMessage());
        }
        return $this->results;
    }
}