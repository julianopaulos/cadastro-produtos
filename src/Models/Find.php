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
        $this->sql = "
            SELECT p.id, p.name, GROUP_CONCAT(t.name) AS tags FROM product p
            INNER JOIN product_tag pt ON pt.product_id = p.id
            INNER JOIN tag t ON t.id = pt.tag_id
            GROUP BY p.id
        ";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->execute();
            $this->results = $this->query->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\Exception $e){
            echo($e->getMessage());
        }
        
        return $this->results;
    }

    public function getTags(){
        $this->sql = "SELECT * FROM tag";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->execute();
            $this->results = $this->query->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            echo($e->getMessage());
        }
        
        return $this->results;
    }

    function verifyProductName($name){
        $this->sql = "SELECT COUNT(id) AS products FROM product WHERE name = :name";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->bindParam(':name', $name, \PDO::PARAM_STR);
            $this->query->execute();
            $this->results = $this->query->fetch();
        }catch(\PDOException $e){
            echo($e->getMessage());
        }
        
        return $this->results;
    }
}