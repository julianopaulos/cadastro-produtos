<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/config.php';
use App\Controllers\Home;
use App\Controllers\Register;

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

//----------------------------------------Register
$register = new Register();
$router->get('/register', function(){
    global $register;
    $register->load();
});


// Run it!
$router->run();