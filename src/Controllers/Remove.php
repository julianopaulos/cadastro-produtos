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

    function deleteProduct(int $id){
        if(empty($id)){
            return json_encode(["error"=> true,"message" => "Id do produto não recebido!"]);
        }else if(isset($id) && !is_int($id)){
            return json_encode(["error"=> true,"message" => "Id do produto deve ser do tipo int!"]);
        }

        $id = InputValidator::inputSanitizer($id);
        if($id && $this->delete->deleteProductTagByProductId($id) && $this->delete->deleteProduct($id)){
            return json_encode(["error" => false,"message" => "Produto excluído com sucesso!"]);
        }

        return json_encode(["error" => true,"message" => "Ocorreu um erro ao excluir o produto!"]);
    }

    function deleteTag(int $id){
        if(empty($id)){
            return json_encode(["error"=> true,"message" => "Id da tag não recebido!"]);
        }else if(isset($id) && !is_int($id)){
            return json_encode(["error"=> true,"message" => "Id da tag deve ser do tipo int!"]);
        }

        $id = InputValidator::inputSanitizer($id);
        if($id && $this->delete->deleteProductTagByTagId($id) && $this->delete->deleteTag($id)){
            return json_encode(["error" => false,"message" => "Tag excluída com sucesso!"]);
        }
        
        return json_encode(["error" => true,"message" => "Ocorreu um erro ao excluir a tag!"]);
        
    }

    
}