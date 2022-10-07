<?php

namespace Model;

class product extends ActiveRecord {
    protected static $tabla = 'products';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'precio', 'stock', 'categoria', 'imagen'];

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->categoria = $args['categoria'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->stock = $args['stock'] ?? 1;
    }

    public function validar() {
        if(!$this->nombre){
            self::$alertas['error'][] = 'DEBES poner un NOMBRE';
        }
        if( strlen( $this->nombre ) < 30 ) {
            self::$alertas['error'][] = 'El nombre debe tener al menos 30 caracteres';
        }
        if( strlen( $this->nombre ) > 58 ) {
            self::$alertas['error'][] = 'El nombre no puede tener más de 58 caracteres';
        }
        if(!$this->descripcion){
            self::$alertas['error'][] = 'DEBES poner una DESCRIPCION';
        }
        if( strlen( $this->descripcion ) < 50 ) {
            self::$alertas['error'][] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }
        if(!$this->categoria){
            self::$alertas['error'][] = 'DEBES poner una CATEGORIA';
        }
        if(!$this->precio){
            self::$alertas['error'][] = 'DEBES poner una PRECIO';
        }
        return self::$alertas;
    }

}