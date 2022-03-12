<?php

namespace Controllers;

use MVC\Router;
use Model\Registrar;
use Model\Colores;

class UsuarioController
{
    public static function inicio(Router $router)
    {

        //trae todas las propiedades o vendedores de la bd
        $usuarios = Registrar::all();
        $colores = Colores::all();
        //muestra mensaje condicional, ?? si no existe resultado en la url le asigna null
        $mensaje = $_GET['mensaje'] ?? null;

        $router->render('/admin/inicio', [
            'registrar' => $usuarios,
            'mensaje' => $mensaje,
            'colores' => $colores
        ]);
    }

    public static function crear(Router $router)
    {
        $registrar = new Registrar();
        $colores = Colores::all();

        //validamos errores
        $errores = Registrar::getErrores();

        //Ejecutar el codigo sql despues de que el usuario envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $registrar = new Registrar($_POST);

            $errores = $registrar->validarErrores();

            //Revisar que no existan errores
            if (empty($errores)) {
                $registrar->guardar();
            }
        }

        $router->render('usuarios/registrar', [
            'registrar' => $registrar,
            'colores' => $colores,
            'errores' => $errores
        ]);
    }
}
