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

    public function getProductsRel(){
        $this->sql = "
            SELECT 
                t.id AS tag_id,
                t.name AS tag_name,
                GROUP_CONCAT(p.name SEPARATOR ', ') AS products
            FROM
                tag t
                    INNER JOIN
                product_tag pt ON pt.tag_id = t.id
                    INNER JOIN
                product p ON p.id = pt.product_id
            GROUP BY t.id
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

    public function getProducts(){
        $this->sql = "SELECT * FROM product";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->execute();
            $this->results = $this->query->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            echo($e->getMessage());
        }
        
        return $this->results;
    }

    public function getProductById($id){
        $this->sql = "
                    SELECT 
                        p.id,
                        p.name,
                        GROUP_CONCAT(t.id) AS tags 
                    FROM
                        product p
                    INNER JOIN product_tag pt ON pt.product_id = p.id
                    INNER JOIN tag t ON t.id = pt.tag_id
                    WHERE p.id = :id
                    GROUP BY p.id
        ";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->bindParam(':id', $id, \PDO::PARAM_INT);
            $this->query->execute();
            $this->results = $this->query->fetch();
        }catch(\PDOException $e){
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

    public function getTagById($id){
        $this->sql = "SELECT * FROM tag WHERE id = :id";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->bindParam(':id', $id, \PDO::PARAM_INT);
            $this->query->execute();
            $this->results = $this->query->fetch();
        }catch(\PDOException $e){
            echo($e->getMessage());
        }
        
        return $this->results;
    }

    public function verifyProductName($name, int $id = null){
        $this->sql = "SELECT COUNT(id) AS products FROM product WHERE name = :name";
        if($id){
            $this->sql .= " AND id <> :id";
        }
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->bindParam(':name', $name, \PDO::PARAM_STR);
            if($id){
                $this->query->bindParam(':id', $id, \PDO::PARAM_INT);
            }
            $this->query->execute();
            $this->results = $this->query->fetch();
        }catch(\PDOException $e){
            echo($e->getMessage());
        }
        
        return $this->results;
    }

    public function verifyTagName($name){
        $this->sql = "SELECT COUNT(id) AS tags FROM tag WHERE name = :name";
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