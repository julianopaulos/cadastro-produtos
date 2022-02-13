<?php

namespace App\Controllers;
use App\Models\Insert;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Register{
    private $loader;
    private $twig;
    private $insert;
    function __construct() {
        $_POST = json_decode(file_get_contents("php://input"),true);

        $this->insert = new Insert();

        $this->loader = new FilesystemLoader("src/Views");
        $this->twig = new Environment($this->loader);
    }

    function loadProduct() {
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("register/register.php");
        echo $template->render(['header' => $header->render(['BASE_URL' => BASE_URL, 'PAGE_NAME' => 'Cadastro de Produto']), 'BASE_URL_ASSETS' => BASE_URL."src/Views/register"]);
    }

    function registerProduct(){
        if(empty($_POST) || !isset($_POST['name']) || empty($_POST['name']) || !isset($_POST['tags']) || empty($_POST['tags'])){
            return json_encode(["error"=> true,"message" => "Todos os campos são obrigatórios e não podem estar vazios!"]);
        }
        return json_encode(["error" => false,"message" => "Produto cadastrado com sucesso!"]);
    }

    function loadTag() {
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("tagregister/tagregister.php");
        echo $template->render(['header' => $header->render(['BASE_URL' => BASE_URL, 'PAGE_NAME' => 'Cadastro de Tag']), 'BASE_URL_ASSETS' => BASE_URL."src/Views/register"]);
    }

    function registerTag(){
        if(empty($_POST) || !isset($_POST['name']) || empty($_POST['name']) || !isset($_POST['tags']) || empty($_POST['tags'])){
            return json_encode(["error"=> true,"message" => "Todos os campos são obrigatórios e não podem estar vazios!"]);
        }
        return json_encode(["error" => false,"message" => "Produto cadastrado com sucesso!"]);
    }

    
}