<?php

namespace App\Models;
use App\Models\Conn\Conn;

class Update extends Conn{
    private $connection;
    private $sql;
    private $query;
    private $results;
    function __construct(){
        $this->connection = $this->getConnection();
    }

    public function updateProduct($id, $name){
        $this->sql = "
            UPDATE product
            SET name = :name
            WHERE id = :id
        ";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->bindParam(':name', $name, \PDO::PARAM_STR);
            $this->query->bindParam(':id', $id, \PDO::PARAM_INT);
            $this->results = $this->query->execute();
        }catch(\PDOException $e){
            die($e->getMessage());
        }
        return $this->results;
    }

    public function updateTag($id, $name){
        $this->sql = "
            UPDATE tag
            SET name = :name
            WHERE id = :id
        ";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->bindParam(':name', $name, \PDO::PARAM_STR);
            $this->query->bindParam(':id', $id, \PDO::PARAM_INT);
            $this->results = $this->query->execute();
        }catch(\PDOException $e){
            die($e->getMessage());
        }
        return $this->results;
    }

}