<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Login::index'); // Ruta predeterminada.
$routes->post('/','Login::login'); // Post de inicio de sesion.

$routes->get('/register','Register::index'); // Ruta de registro de usuarios.

$routes->get('/blog','Blog::index'); // Ruta del blog.
$routes->get('/logout','Blog::logout'); // Cierre de sesion desde el blog.