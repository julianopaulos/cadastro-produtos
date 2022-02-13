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
    $home->loadProduct();
});
$router->get('/home', function(){
    global $home;
    $home->loadProduct();
});

$router->get('/taghome', function(){
    global $home;
    $home->loadTag();
});


//----------------------------------------Register
$register = new Register();
$router->get('/register', function(){
    global $register;
    $register->loadProduct();
});
$router->post('/register', function(){
    global $register;
    echo $register->registerProduct();
});

$router->get('/tagregister', function(){
    global $register;
    $register->loadTag();
});
$router->post('/tagregister', function(){
    global $register;
    echo $register->registerTag();
});

// Run it!
$router->run();