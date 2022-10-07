<?php

namespace Controllers;

use Model\product;
use MVC\Router;

class PagesController {
    public static function index(Router $router) {
        
        $products = Product::get(5);
        $inicio = true;

        $router->render('pages/index', [
            'titulo' => 'headphones',
            'products' => $products,
            'inicio' => $inicio,
        ]);
    }

    public static function list(Router $router){
        $products = Product::all();

        $router->render('pages/listado', [
            'titulo' => 'all the products',
            'products' => $products,
        ]);
    }

    public static function product(Router $router){
        $id = $_GET['id'];
        $product = new Product();
        $product = Product::find($id);

        $router->render('pages/product', [
            'titulo' => 'headseds',
            'product' => $product,
        ]);
    }

    public static function about(Router $router) {
        $router->render('pages/about', [
            'titulo' => 'about',
        ]);
    }
    public static function category(Router $router) {
        $category = $_GET['category'];
        $category = s($category);

        $products = Product::where('categoria', $category);

        $router->render('pages/category', [
            'titulo' => $category,
            'products' => $products,
        ]);
    }
}