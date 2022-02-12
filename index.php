<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controllers\Home;

define("BASE_URL", "http://localhost/teste_cadastro_produtos/");

// Create Router instance
$router = new \Bramus\Router\Router();
$router->setNamespace('\App\Controllers');

//----------------------------------------HOME
$home = new Home();
$router->get('/', function(){
    global $home;
    $home->load();
});
$router->get('/home', function(){
    global $home;
    $home->load();
});

// Run it!
$router->run();