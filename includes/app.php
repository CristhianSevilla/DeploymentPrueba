<?php

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//cconexión a DB
$db = conectarDB();

//importar clases
use Model\ActiveRecord;

ActiveRecord::setDB($db);
