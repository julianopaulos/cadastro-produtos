<?php

namespace App\Controllers;
use App\Models\Update;
use App\Models\Find;
use App\Utils\InputValidator;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Edit{
    private $loader;
    private $twig;
    private $update;
    private $find;
    function __construct() {
        $_PUT = json_decode(file_get_contents("php://input"),true);

        $this->find = new Find();
        $this->update = new Update();

        $this->loader = new FilesystemLoader("src/Views");
        $this->twig = new Environment($this->loader);
    }

    function loadProduct(int $id) {
        $id = InputValidator::inputSanitizer($id);
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("productedit/productedit.php");
        echo $template->render([
            'header' => $header->render(['BASE_URL' => BASE_URL,
            'PAGE_NAME' => 'Cadastro de Produto']),
            'BASE_URL_ASSETS' => BASE_URL."src/Views/productedit",
            'product' => $this->find->getProductById($id)
        ]);
    }

    function editProduct(int $id, string $name = '', array $tags = []){
        if(empty($_PUT) || !isset($_PUT['name']) || empty($_PUT['name']) || !isset($_PUT['tags']) || empty($_PUT['tags'])){
            return json_encode(["error"=> true,"message" => "Todos os campos são obrigatórios e não podem estar vazios!"]);
        }
        return json_encode(["error" => false,"message" => "Produto cadastrado com sucesso!"]);
    }

    function loadTag(int $id) {
        $id = InputValidator::inputSanitizer($id);
        
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("tagedit/tagedit.php");
        echo $template->render([
            'header' => $header->render(['BASE_URL' => BASE_URL,
            'PAGE_NAME' => 'Cadastro de Tag']),
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
        if($this->find->verifyTagName($name)['tags'] > 0){
            return json_encode(["error" => true,"message" => "Já existe tag com o mesmo nome cadastrada!"]);
        }

        if($id && $name && $this->update->updateTag($id, $name)){
            return json_encode(["error" => false,"message" => "Tag atualizada com sucesso!"]);
        }

        return json_encode(["error" => true,"message" => "Erro ao atualizar tag!"]);
    }

    
}