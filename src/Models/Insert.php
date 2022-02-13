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
        $this->sql = "
            INSERT INTO product (name)
            VALUES(:name)
        ";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->bindParam(':name', $name, \PDO::PARAM_STR);
            $this->query->execute();
            $this->results = $this->connection->lastInsertId();
        }catch(\PDOException $e){
            die($e->getMessage());
        }
        return $this->results;
    }

    function saveProductTags($tags, $product_id){
        $error = false;
        $this->sql = "
            INSERT INTO product_tag (product_id, tag_id)
            VALUES(:productId, :tagId)
        ";

        foreach($tags as $tag){
            try{
                $this->query = $this->connection->prepare($this->sql);
                $this->query->bindParam(':productId', $product_id, \PDO::PARAM_STR);
                $this->query->bindParam(':tagId', $tag, \PDO::PARAM_STR);
                $this->results = $this->query->execute();
            }catch(\PDOException $e){
                $error = true;
                echo($e->getMessage());
                break;
            }
        }

        if($error){
            return false;
        }

        return $this->results;
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