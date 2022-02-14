<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/config.php';
use App\Controllers\Home;
use App\Controllers\Register;
use App\Controllers\Edit;
use App\Controllers\Remove;

// Create Router instance
$router = new \Bramus\Router\Router();
$router->setNamespace('\App\Controllers');

//----------------------------------------HOME
$home = new Home();
$router->get('/', function(){
    global $home;
    $home->loadProduct();
});
$router->get('/producthome', function(){
    global $home;
    $home->loadProduct();
});

$router->get('/taghome', function(){
    global $home;
    $home->loadTag();
});



//----------------------------------------REGISTER
$register = new Register();
$router->get('/productregister', function(){
    global $register;
    $register->loadProduct();
});
$router->post('/productregister', function(){
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



//------------------------------EDIT
$edit = new Edit();
$router->get('/tagedit/(\d+)', function($id){
    global $edit;
    $edit->loadTag($id);
});
$router->put('/tagedit/(\d+)', function($id){
    global $edit;
    $_PUT = json_decode(file_get_contents("php://input"),true);
    echo $edit->editTag($id, $_PUT['name']);
});

$router->get('/productedit/(\d+)', function($id){
    global $edit;
    $edit->loadProduct($id);
});



//------------------------------DELETE
$delete = new Remove();
$router->delete('/tagdelete/(\d+)', function($id){
    global $delete;
    echo $delete->deleteTag($id);
});
$router->delete('/productdelete/(\d+)', function($id){
    global $delete;
    echo $delete->deleteProduct($id);
});


// Run it!
$router->run();