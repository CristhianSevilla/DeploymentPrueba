<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class LoginController
{
    public static function login(Router $router)
    {

        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Usuario($_POST);

            $errores = $auth->validarErrores();

            if (empty($errores)) {
                //Validar que el usuario exista
                $resultado =  $auth->existeUsuario();

                if (!$resultado) {
                    $errores = Usuario::getErrores();
                } else {
                    //Validar el password
                    $autenticado = $auth->comprobarPassword($resultado);

                    if ($autenticado) {
                        //Autenticar al usuario
                        $auth->autenticar();
                    } else {
                        //Password incorrecto mensaje de error
                        $errores = Usuario::getErrores();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores,
        ]);
    }

    public static function logout()
    {
        session_start();

        $_SESSION = []; //borramos datos de sesion

        header('Location: /');
    }
}
