<?php

namespace Model;

class Registrar extends ActiveRecord
{

    protected static $tabla = 'usuario';
    protected static $columnasDB = ['id', 'correo', 'contraseña', 'colorId'];

    public $id;
    public $correo;
    public $contraseña;
    public $colorId;

    //constructor
    function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->correo = $args['email'] ?? '';
        $this->contraseña = $args['password'] ?? '';
        $this->colorId = $args['color'] ?? '';
    }

    public function validarErrores()
    {

        if (!$this->correo) {
            self::$errores[] = "El correo es obligatorio";
        }
        if (!$this->contraseña) {
            self::$errores[] = "La contraseña es obligatoria";
        }
        if (!$this->colorId) {
            self::$errores[] = "Selecciona un color";
        }

        return self::$errores;
    }

    public function guardar()
    {
        //Hashear el password
        $passwordHash = password_hash($this->contraseña, PASSWORD_DEFAULT);

        // insertar en la base
        $query = " INSERT INTO usuario (correo, contraseña, colorId) VALUES ('$this->correo', '$passwordHash', '$this->colorId')";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /?mensaje=1');
        }
    }
}
