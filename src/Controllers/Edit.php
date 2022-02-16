<?php

namespace App\Controllers;
use App\Models\Update;
use App\Models\Insert;
use App\Models\Delete;
use App\Models\Find;
use App\Utils\InputValidator;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Edit{
    private $loader;
    private $twig;
    private $update;
    private $find;
    private $insert;
    private $delete;
    function __construct() {
        $_PUT = json_decode(file_get_contents("php://input"),true);

        $this->find = new Find();
        $this->update = new Update();
        $this->insert = new Insert();
        $this->delete = new Delete();

        $this->loader = new FilesystemLoader("src/Views");
        $this->twig = new Environment($this->loader);
    }

    function loadProduct(int $id) {
        $id = InputValidator::inputSanitizer($id);
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("productedit/productedit.php");
        $product = $this->find->getProductById($id);
        $tags = $product['tags'];
        return $template->render([
            'header' => $header->render(['BASE_URL' => BASE_URL,
            'PAGE_NAME' => 'Edição de Produto']),
            'BASE_URL_ASSETS' => BASE_URL."src/Views/productedit",
            'product' => $product,
            'product_tags' => $tags,
            'tags' => $this->find->getTags()
        ]);
    }

    function editProduct(int $id, string $name = '', $tags = []){

        if(!is_array($tags) || count($tags) === 0){
            return json_encode(["error"=> true,"message" => "Deve ser enviada ao menos uma tag!"]);
        }

        if(empty($id) || empty($name)){
            return json_encode(["error"=> true,"message" => "Todos os campos são obrigatórios e não podem estar vazios!"]);
        }

        $id = InputValidator::inputSanitizer($id);
        $name = InputValidator::inputSanitizer($name);

        if($this->find->verifyProductName($name, $id)['products'] > 0){
            return json_encode(["error" => true,"message" => "Já existe produco com o mesmo nome cadastrado!"]);
        }
        
        if($id && $name && $this->update->updateProduct($id, $name) && $this->delete->deleteProductTagByProductId($id) && $this->insert->saveProductTags($tags, $id)){
            return json_encode(["error" => false,"message" => "Produto atualizado com sucesso!"]);
        }

        return json_encode(["error" => true,"message" => "Ocorreu um erro ao atualizar o produto e suas tags!"]);
    }

    function loadTag(int $id) {
        $id = InputValidator::inputSanitizer($id);
        
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("tagedit/tagedit.php");
        return $template->render([
            'header' => $header->render(['BASE_URL' => BASE_URL,
            'PAGE_NAME' => 'Edição de Tag']),
            'BASE_URL_ASSETS' => BASE_URL."src/Views/tagedit",
            'tag' => $this->find->getTagById($id)
        ]);
    }

    function editTag(int $id, string $name = '') {
        
        if(empty($id) || empty($name)){
            return json_encode(["error"=> true,"message" => "Todos os campos são obrigatórios e não podem estar vazios!"]);
        }
        $id = InputValidator::inputSanitizer($id);
        $name = InputValidator::inputSanitizer($name);
        if($this->find->verifyTagName($name, $id)['tags'] > 0){
            return json_encode(["error" => true,"message" => "Já existe tag com o mesmo nome cadastrada!"]);
        }

        if($id && $name && $this->update->updateTag($id, $name)){
            return json_encode(["error" => false,"message" => "Tag atualizada com sucesso!"]);
        }

        return json_encode(["error" => true,"message" => "Erro ao atualizar tag!"]);
    }

    
}