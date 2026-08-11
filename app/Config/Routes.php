<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

$routes->get('/', 'AuthController::entry');

$routes->get('login', 'AuthController::login');

$routes->post('login', 'AuthController::authenticate');

$routes->get('logout', 'AuthController::logout');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

$routes->get('dashboard', 'Home::index');


/*
|--------------------------------------------------------------------------
| POS
|--------------------------------------------------------------------------
*/

$routes->get('pos', 'PosController::index');