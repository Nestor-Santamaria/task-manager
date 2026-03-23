<?php

// Definir la ruta base del proyecto
define('BASE_PATH', __DIR__);

// Cargar el enrutador
require_once 'core/Router.php';

// Inicializar el enrutador
$router = new Router();

// Registrar rutas
$router->get('/', 'DashboardController@index');
$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->get('/projects/{id}', 'ProjectController@show');

// Despachar la ruta actual
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
