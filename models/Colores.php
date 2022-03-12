<?php

namespace Model;

class Colores extends ActiveRecord
{
    protected static $tabla = 'colores';
    protected static $columnasDB = ['id', 'color', 'hexadecimal'];

    public $id;
    public $color;
    public $hexadecimal;

    //constructor
    function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->color = $args['color'] ?? '';
        $this->hexadecimal = $args['hexadecimal'] ?? '';
    }
}
