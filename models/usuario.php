<?php

namespace Model;

class Usuario extends ActiveRecord
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
            self::$errores[] = "Ingresa un Email válido";
        }
    
        if (!$this->contraseña) {
            self::$errores[] = "Ingresa un Password";
        }

        return self::$errores;
    }

    public function existeUsuario(){
        $query = "SELECT * FROM usuario WHERE correo = '" . $this->correo . "' LIMIT 1";

        $resultado= self::$db->query($query);


        if (!$resultado->num_rows) {
            self::$errores[] = 'El usuario no existe';
            return;//para que el codigo deje de ejecutarse
        }

        return $resultado;
    }

    
    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->contraseña, $usuario->contraseña);

        if (!$autenticado) {
            self::$errores[]='El password es incorrecto';
        }

        return $autenticado;
    }

    public function autenticar(){

        session_start();

        $_SESSION['usuario'] = $this->correo;
        $_SESSION['login'] = true;

        header('Location: /inicio');
    }
}
