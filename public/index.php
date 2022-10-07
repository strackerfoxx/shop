<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PagesController;
use Controllers\LoginController;
use Controllers\CartController;
use Controllers\ProductController;

$router = new Router();

//Main Pages  
$router->get('/', [PagesController::class, 'index']);
$router->get('/about', [PagesController::class, 'about']);
$router->get('/header', [LoginController::class, 'header']);

//login
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

// create account
$router->get('/create', [LoginController::class, 'create']);
$router->post('/create', [LoginController::class, 'create']);

// logout
$router->get('/logout', [LoginController::class, 'logout']);

// admin
$router->get('/admin', [ProductController::class, 'index']);

//CRUD
//create
$router->get('/crear', [ProductController::class, 'crear']);
$router->post('/crear', [ProductController::class, 'crear']);

//update
$router->get('/update', [ProductController::class, 'update']);
$router->post('/update', [ProductController::class, 'update']);

//delete
$router->post('/delete', [ProductController::class, 'delete']);

// PRODUCTS
$router->get('/listado', [PagesController::class, 'list']);
$router->get('/product', [PagesController::class, 'product']);
$router->get('/category', [PagesController::class, 'category']);
//cart
$router->get('/cart', [CartController::class, 'index']);
$router->get('/cart/add', [CartController::class, 'add']);

$router->get('/cart/delete', [CartController::class, 'delete']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();