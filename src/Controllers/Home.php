<?php

namespace App\Controllers;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Home{
    private $loader;
    private $twig;
    function __construct() {
        $this->loader = new FilesystemLoader("src/Views");
        $this->twig = new Environment($this->loader);
    }

    function load() {
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("home/home.php.twig");
        echo $template->render(['header' => $header->render(['BASE_URL' => BASE_URL, 'PAGE_NAME' => 'Listagem de Produtos']), 'BASE_URL_CSS' => BASE_URL."src/Views/home"]);       
    }
}