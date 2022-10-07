<?php

namespace Controllers;

use MVC\Router;
use Model\product;
use Model\User;
use Model\Cart;

class CartController {
    public static function index(Router $router) {


        $router->render('cart/index', [
            'titulo' => 'nice!',
        ]);
    }

    public static function add(Router $router){
        debuguear($_POST);

        $router->render('cart/add', [
            'titulo' => 'cart',
        ]);
    }
}