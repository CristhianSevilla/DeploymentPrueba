<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');

function incluirTemplate(string $nombre)
{
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
    }
}


function debuguear($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

//sanitizar formulario html
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function mostrarNotificacion($codigo)
{
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje= 'Registro Exitoso';
            break;
        
        default:
            $mensaje = false;
            break;        
    }

    return $mensaje;
}

