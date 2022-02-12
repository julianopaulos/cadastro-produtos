<?php

namespace App\Controllers;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Home{
    private $loader;
    private $twig;
    function __construct() {
        $this->loader = new FilesystemLoader("src/Views");
        $this->twig = new Environment($this->loader/* , [
            'cache' => 'App/compilation_cache',
        ] */);
    }

    function load() {

        $template = $this->twig->load("home/home.php.twig");
        //echo $template->render(['title' => 'variables', 'go' => 'here']);
        echo $template->render();
    }
}