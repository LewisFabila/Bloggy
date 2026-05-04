<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Login::index'); // Ruta predeterminada (vista login).
$routes->post('/login','Login::login'); // Funcion que maneja el inicio de sesion.

$routes->get('/register','Register::index'); // Ruta de la vista de registro de usuarios.
$routes->post('/register/create','Register::create'); // Funcion que maneja la creacion de usuarios.

$routes->get('/blog','Blog::index'); // Ruta de la vista del blog (inicio).
$routes->get('/blog/logout','Blog::logout'); // Funcion para el cierre de sesion desde el blog.
$routes->post('/blog/post','Blog::storePost'); // Funcion para publicar un post.
$routes->get('/blog/my-posts','Blog::myPosts'); // Funcion para filtrar posts propios.