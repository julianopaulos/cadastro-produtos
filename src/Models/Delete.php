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
        
    }

    function deleteTag(int $tag_id) {

    }
}