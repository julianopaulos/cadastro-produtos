<?php

namespace App\Controllers;
use App\Models\Delete;
use App\Utils\InputValidator;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Remove{
    private $loader;
    private $delete;
    
    function __construct() {
        $_DELETE = json_decode(file_get_contents("php://input"),true);
        $this->delete = new Delete();

        $this->loader = new FilesystemLoader("src/Views");
        $this->twig = new Environment($this->loader);
    }

    function deleteProduct($id){
        if(empty($id)){
            http_response_code(400);
            return json_encode(["error"=> true,"message" => "Id do produto não recebido!"]);
        }else if(isset($id) && !is_int($id)){
            http_response_code(401);
            return json_encode(["error"=> true,"message" => "Id do produto deve ser do tipo int!"]);
        }

        $id = InputValidator::inputSanitizer($id);
        if($id && $this->delete->deleteProductTagByProductId($id) && $this->delete->deleteProduct($id)){
            http_response_code(200);
            return json_encode(["error" => false,"message" => "Produto excluído com sucesso!"]);
        }
        http_response_code(500);
        return json_encode(["error" => true,"message" => "Ocorreu um erro ao excluir o produto!"]);
    }

    function deleteTag($id){
        if(empty($id)){
            http_response_code(400);
            return json_encode(["error"=> true,"message" => "Id da tag não recebido!"]);
        }else if(isset($id) && !is_int($id)){
            http_response_code(401);
            return json_encode(["error"=> true,"message" => "Id da tag deve ser do tipo int!"]);
        }

        $id = InputValidator::inputSanitizer($id);
        if($id && $this->delete->deleteProductTagByTagId($id) && $this->delete->deleteTag($id)){
            http_response_code(200);
            return json_encode(["error" => false,"message" => "Tag excluída com sucesso!"]);
        }
        http_response_code(500);
        return json_encode(["error" => true,"message" => "Ocorreu um erro ao excluir a tag!"]);
        
    }
}