<?php

namespace Model;

class Cart extends ActiveRecord {
    protected static $tabla = 'Cart';
    protected static $columnasDB = ['id', 'idproduct', 'iduser'];

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->idproduct = $args['idproduct'] ?? '';
        $this->iduser = $args['iduser'] ?? '';
    }
}