<?php

namespace Model;

class ActiveRecord
{

    public static $db;

    protected static $tabla = '';
    protected static $columnasDB = [];

    //errores o validaciones
    protected static $errores = [];


    //Validacion de formulario (errores)
    public function validarErrores()
    {
        static::$errores = [];
        return static::$errores;
    }

    //Lista todos los registos
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Consultar bd
    public static function consultarSQL($query): array
    {
        //consultar la bd
        $resultado = self::$db->query($query);

        //iterar los resultados
        $array = [];
        //asignar a registroun arreglo asociativo con el resultado de la consulta
        while ($registro = $resultado->fetch_assoc()) {
            //convertir el arreglo en objeto
            $array[] = static::crearObjeto($registro);
        }

        //liberar la memoria
        $resultado->free();

        //retornar los resultados
        return $array;
    }

    //Devuelve un objeto con los datos de la base
    protected static function crearObjeto($array): object
    {
        //creamos un nuevo objeto de la tabla
        $objeto = new static;

        foreach ($array as $key => $value) {
            //property_exists compara que el array que resivio tenga una llave igual a la del onjeto
            if (property_exists($objeto, $key)) {
                //si existen las llaves del objeto y el array son iguales asigna valores al objeto
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    public static function setDB($database)
    {
        self::$db = $database;
    }


    //getErrores
    public static function getErrores(): array
    {
        return static::$errores;
    }
}
