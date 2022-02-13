<?php

namespace App\Controllers;
use App\Models\Delete;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Remove{
    private $loader;
    private $Delete;
    function __construct() {
        $_DELETE = json_decode(file_get_contents("php://input"),true);

        $this->Delete = new Delete();

        $this->loader = new FilesystemLoader("src/Views");
        $this->twig = new Environment($this->loader);
    }

    function deleteProduct(){
        if(empty($_DELETE) || !isset($_DELETE['id']) || empty($_DELETE['id'])){
            return json_encode(["error"=> true,"message" => "Id do produto não recebido!"]);
        }else if(isset($_DELETE['id']) && !is_int($_DELETE['id'])){
            return json_encode(["error"=> true,"message" => "Id do produto deve ser do tipo int!"]);
        }
        return json_encode(["error" => false,"message" => "Produto cadastrado com sucesso!"]);
    }

    function deleteTag(){
        if(empty($_DELETE) || !isset($_DELETE['id']) || empty($_DELETE['id'])){
            return json_encode(["error"=> true,"message" => "Id da tag não recebido!"]);
        }else if(isset($_DELETE['id']) && !is_int($_DELETE['id'])){
            return json_encode(["error"=> true,"message" => "Id da tag deve ser do tipo int!"]);
        }
        return json_encode(["error" => false,"message" => "Tag excluída com sucesso!"]);
    }

    
}