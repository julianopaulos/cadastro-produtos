<?php

namespace App\Models;
use App\Models\Conn\Conn;

class Delete extends Conn{
    private $connection;
    private $sql;
    private $query;
    private $results;
    function __construct(){
        $this->connection = $this->getConnection();
    }

    function deleteProduct(int $product_id) {
        $this->sql = "
            DELETE FROM product
            WHERE id = :id
        ";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->bindParam(':id', $product_id, \PDO::PARAM_INT);
            $this->results = $this->query->execute();
        }catch(\Exception $e){
            echo "Error: ".$e->getMessage();
        }
        return $this->results;
    }

    function deleteTag(int $tag_id) {
        $this->sql = "
            DELETE FROM tag
            WHERE id = :id
        ";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->bindParam(':id', $tag_id, \PDO::PARAM_INT);
            $this->results = $this->query->execute();
        }catch(\Exception $e){
            echo "Error: ".$e->getMessage();
        }
        return $this->results;
    }

    public function deleteProductTagByTagId(int $tag_id) {
        $this->sql = "
            DELETE FROM product_tag
            WHERE tag_id = :id
        ";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->bindParam(':id', $tag_id, \PDO::PARAM_INT);
            $this->results = $this->query->execute();
        }catch(\Exception $e){
            echo "Error: ".$e->getMessage();
        }
        return $this->results;
    }

    public function deleteProductTagByProductId(int $product_id) {
        $this->sql = "
            DELETE FROM product_tag
            WHERE product_id = :id
        ";
        try{
            $this->query = $this->connection->prepare($this->sql);
            $this->query->bindParam(':id', $product_id, \PDO::PARAM_INT);
            $this->results = $this->query->execute();
        }catch(\Exception $e){
            echo "Error: ".$e->getMessage();
        }
            
        return $this->results;
    }
}