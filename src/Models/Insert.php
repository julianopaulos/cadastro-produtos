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
}