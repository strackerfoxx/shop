<?php

namespace Controllers;

use MVC\Router;
use Model\Product;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController{
    public static function index(Router $router) {
        $products = Product::all();
        

        $router->render('admin/admin', [
            'titulo' => 'admin',
            'products' => $products
            
        ]);
    }

    public static function crear(Router $router){
        $product = new product;
        // Arreglo con mensajes de alertas
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // crea una nueva instancia
    
            $product->sincronizar($_POST);
            $alertas = $product->validar();
    
    
        // SUBIR ARCHIVOS
                // Crear carpeta
                $carpetaImagenes = '../public/image/';
        
                if(!is_dir($carpetaImagenes)) {
                    mkdir($carpetaImagenes);
                }
    
                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpeg";
    
                //Setear la imagen
                //Realiza un resize a la imagen con intervention
    
                if($_FILES['imagen']['tmp_name']) {
                    $image = Image::make($_FILES['imagen']['tmp_name'])->fit(220, 146);
                    $product->setImagen($nombreImagen);
                }
     
                if(empty($alertas)){

                       // Guarda la imagen en el servidor
                    $image->save($carpetaImagenes . $nombreImagen);

                    //guardar en la base de datos

                    $resultado = $product->guardar();
                    
                    if($resultado) {
                        header('location: /admin');
                    }
                }
        }

        $alertas = Product::getAlertas();

        $router->render('admin/crear', [
            'product' => $product,
            'alertas' => $alertas
        ]);
    }

    public static function update(Router $router){

        $id = validarORedireccionar('/admin');
        $product = Product::find($id);

        $alertas = Product::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //asignar los atributos
            $args = $_POST;
    
            $product->sincronizar($args);
    
            $alertas = $product->validar();

        // SUBIR ARCHIVOS
            // Crear carpeta
            $carpetaImagenes = '../public/image/';
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpeg";

            if($_FILES['imagen']['tmp_name']) {
                $image = Image::make($_FILES['imagen']['tmp_name'])->fit(220, 146);
                $product->setImagen($nombreImagen);
            }

            if(empty($alertas)){
                if($_FILES['imagen']['tmp_name']) {
                // Guarda la imagen en el servidor
                    $image->save($carpetaImagenes . $nombreImagen);
                }
                //guardar en la base de datos
                $resultado = $product->guardar();
                
                if($resultado) {
                    header('location: /admin');
                }
            }
        }

            $router->render('admin/update', [
                'alertas' => $alertas,
                'product' => $product,
            ]);
        }

    public static function delete(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if($id){
                    $product = Product::find($id);
                    $resultado = $product->eliminar();

                    if($resultado){
                        header('location: /admin');
                    }
            }
        }

    }

}