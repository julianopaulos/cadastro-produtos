<?php

namespace App\Controllers;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Register{
    private $loader;
    private $twig;
    function __construct() {
        $this->loader = new FilesystemLoader("src/Views");
        $this->twig = new Environment($this->loader);
    }

    function load() {
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("register/register.php.twig");
        echo $template->render(['header' => $header->render(['BASE_URL' => BASE_URL, 'PAGE_NAME' => 'Registro de Produtos']), 'BASE_URL_CSS' => BASE_URL."src/Views/register"]);
    }

    function register(){
        
    }
}