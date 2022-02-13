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

    function loadProduct() {
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("home/home.php");
        echo $template->render(['header' => $header->render(['BASE_URL' => BASE_URL, 'PAGE_NAME' => 'Listagem de Produtos']), 'BASE_URL_CSS' => BASE_URL."src/Views/home"]);
    }

    function loadTag() {
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("taghome/taghome.php");
        echo $template->render(['header' => $header->render(['BASE_URL' => BASE_URL, 'PAGE_NAME' => 'Listagem de Tags']), 'BASE_URL_CSS' => BASE_URL."src/Views/taghome"]);
    }
}