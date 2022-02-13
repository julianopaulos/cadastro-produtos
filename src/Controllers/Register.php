<?php

namespace App\Controllers;
use App\Utils\InputValidator;
use App\Models\Insert;
use App\Models\Find;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Register{
    private $loader;
    private $twig;
    private $insert;
    private $find;
    function __construct() {
        $_POST = json_decode(file_get_contents("php://input"),true);
        
        $this->find = new Find();
        $this->insert = new Insert();

        $this->loader = new FilesystemLoader("src/Views");
        $this->twig = new Environment($this->loader);
    }

    //------------------------------PRODUTO


    function loadProduct() {
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("productregister/productregister.php");
        echo $template->render([
            'header' => $header->render(['BASE_URL' => BASE_URL,
            'PAGE_NAME' => 'Cadastro de Produto']),
            'BASE_URL_ASSETS' => BASE_URL."src/Views/productregister",
            'tags' => $this->find->getTags()
        ]);
    }

    function registerProduct(){
        if(empty($_POST) || !isset($_POST['name']) || empty($_POST['name']) || !isset($_POST['tags']) || empty($_POST['tags'])){
            return json_encode(["error"=> true,"message" => "Todos os campos são obrigatórios e não podem estar vazios!"]);
        }
        return json_encode(["error" => false,"message" => "Produto cadastrado com sucesso!"]);
    }




    //------------------------------TAG


    function loadTag() {
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("tagregister/tagregister.php");
        echo $template->render(['header' => $header->render(['BASE_URL' => BASE_URL, 'PAGE_NAME' => 'Cadastro de Tag']), 'BASE_URL_ASSETS' => BASE_URL."src/Views/tagregister"]);
    }

    function registerTag(){
        if(empty($_POST) || !isset($_POST['name']) || empty($_POST['name'])){
            return json_encode(["error"=> true,"message" => "Todos os campos são obrigatórios e não podem estar vazios!"]);
        }

        $name = InputValidator::inputSanitizer($_POST['name']);
        if($name && $this->insert->saveTag($name)){
            return json_encode(["error" => false,"message" => "Tag cadastrada com sucesso!"]);
        }
        
        return json_encode(["error" => true,"message" => "Erro no cadastro da tag, verifique o campo enviado!"]);
    }

    
}