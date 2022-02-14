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
    private $Update;
    private $find;
    function __construct() {
        $_POST = json_decode(file_get_contents("php://input"),true);

        $this->find = new Find();
        $this->Update = new Update();

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

    function editProduct(){
        if(empty($_POST) || !isset($_POST['name']) || empty($_POST['name']) || !isset($_POST['tags']) || empty($_POST['tags'])){
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

    function editTag(){
        if(empty($_POST) || !isset($_POST['name']) || empty($_POST['name']) || !isset($_POST['tags']) || empty($_POST['tags'])){
            return json_encode(["error"=> true,"message" => "Todos os campos são obrigatórios e não podem estar vazios!"]);
        }
        return json_encode(["error" => false,"message" => "Produto cadastrado com sucesso!"]);
    }

    
}