<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Login::index'); // Ruta predeterminada (vista login).
$routes->post('/','Login::login'); // Funcion que maneja el inicio de sesion.

$routes->get('/register','Register::index'); // Ruta de la vista de registro de usuarios.
$routes->post('/register','Register::create'); // Funcion que maneja la creacion de usuarios.

$routes->get('/blog','Blog::index'); // Ruta de la vista del blog (inicio).
$routes->get('/logout','Blog::logout'); // Funcion para el cierre de sesion desde el blog.