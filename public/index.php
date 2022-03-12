<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\UsuarioController;
use Controllers\LoginController;

$router = new Router();

//zona protegida
$router->get('/inicio', [UsuarioController::class, 'inicio']);

//Zona Publica
$router->get('/registrar', [UsuarioController::class, 'crear']);
$router->post('/registrar', [UsuarioController::class, 'crear']);

//login y autenticación
$router->get('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);
$router->post('/', [LoginController::class, 'login']);








$router->comprobarRutas();
