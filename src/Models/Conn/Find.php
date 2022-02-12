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
}