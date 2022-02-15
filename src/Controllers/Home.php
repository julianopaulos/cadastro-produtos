<?php

namespace App\Controllers;
use App\Models\Find;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Home{
    private $loader;
    private $twig;
    private $find;
    function __construct() {
        $this->find = new Find();
        
        $this->loader = new FilesystemLoader("src/Views");
        $this->twig = new Environment($this->loader);
    }

    function loadProduct() {
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("producthome/producthome.php");
        return $template->render([
            'header' => $header->render(['BASE_URL' => BASE_URL, 
            'PAGE_NAME' => 'Listagem de Produtos']), 
            'BASE_URL_ASSETS' => BASE_URL."src/Views/producthome",
            'products' => $this->find->getProducts()
        ]);
    }

    function loadProductReport() {
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("productreport/productreport.php");
        return $template->render([
            'header' => $header->render(['BASE_URL' => BASE_URL,
            'PAGE_NAME' => 'Relatório de relevância']), 
            'BASE_URL_ASSETS' => BASE_URL."src/Views/productreport",
            'products_rel' => $this->find->getProductsRel()
        ]);
    }

    function loadTag() {
        $header = $this->twig->load("header/header.php");
        $template = $this->twig->load("taghome/taghome.php");
        return $template->render([
            'header' => $header->render(['BASE_URL' => BASE_URL, 'PAGE_NAME' => 'Listagem de Tags']),
            'BASE_URL_ASSETS' => BASE_URL."src/Views/taghome",
            'tags' => $this->find->getTags()
        ]);
    }
}