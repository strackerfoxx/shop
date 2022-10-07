<?php

namespace Controllers;

use Model\User;
use MVC\Router;

class LoginController {

    public static function login(Router $router) {
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = new User($_POST);
            $alertas = $usuario->validarLogin();

            if(empty($alertas)) {
                $usuario = User::where('email', $usuario->email);
                if(!$usuario){
                    User::setAlerta('error', 'El usuario no existe o la contraseña no es correcta');
                }else{
                    if(password_verify($_POST['password'], $usuario->password)){

                        // Iniciar la sesion
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['admin'] = $usuario->admin;
                        $_SESSION['login'] = true;

                        // Redireccionar al index
                        header('location: /');

                    }else{
                        User::setAlerta('error', 'El usuario no existe o la contraseña no es correcta');
                    }
                }
            }
        }
        $alertas = User::getAlertas();
        $router->render('auth/login', [
            'titulo' => 'Login',
            'alertas' => $alertas,
        ]);
    }

    public static function create(Router $router) {
        $alertas = [];
        $usuario = new User;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

        if(empty($alertas)) {
            $existeUsuario = User::where('email', $usuario->email);

            if($existeUsuario) {
                $alertas['error'][] = 'El email ya está registrado';
            } else {
                $usuario->password = password_hash($usuario->password, PASSWORD_DEFAULT);
                // Crear un nuevo usuario
                $resultado =  $usuario->guardar();
                if($resultado){
                    header('Location: /login');
                }
            }
        }

        }

        $router->render('auth/create', [
            'titulo' => 'create',
            'alertas' => $alertas,
            'usuario' => $usuario,
        ]);
    }
    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

}