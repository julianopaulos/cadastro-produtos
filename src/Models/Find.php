<?php

namespace App\Models;

use App\Models\Conn\Conn;

class Find extends Conn{
    private $connection;
    private $sql;
    private $query;
    private $results;
    function __construct(){
        $this->connection = $this->getConnection();
    }

    public function getProducts(){
        $this->sql = "SELECT * FROM product";
        $this->query = $this->connection->prepare($this->sql);
        $this->query->execute();
        $this->results = $this->query->fetchAll(\PDO::FETCH_ASSOC);
        return $this->results;
    }

    public function getTags(){
        $this->sql = "SELECT * FROM tag";
        $this->query = $this->connection->prepare($this->sql);
        try{
            $this->query->execute();
            $this->results = $this->query->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            die($e->getMessage());
        }
        
        return $this->results;
    }
}