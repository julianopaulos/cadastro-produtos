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
        $this->sql = "SHOW TABLES";
        $this->query = $this->connection->prepare($this->sql);
        $this->query->execute();
        $this->results = $this->query->fetchAll();
        return $this->results;
    }
}