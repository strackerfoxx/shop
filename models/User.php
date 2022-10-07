<?php

namespace Model;

class User extends ActiveRecord{
    protected static $tabla = 'users';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'admin'];

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->admin = $args['admin'] ?? 0;
    }

    // Validacion para cuentas nuevas
    public function validarNuevaCuenta() {
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre del Usuario es obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El email del Usuario es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El password no puede ir vacio';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El password del Usuario debe contener al menos 6 caracteres';
        }
        if($this->password !== $this->password2){
            self::$alertas['error'][] = 'El password no coincide';
        }
        return self::$alertas;
    }

    public function validarLogin() {
        if(!$this->email){
            self::$alertas['error'][] = 'El email del Usuario es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El password no puede ir vacio';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            self::$alertas['error'][] = 'EL email NO valido';
        }
        return self::$alertas;
    }

}