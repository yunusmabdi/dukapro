<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('products', 'Products::index');

$routes->get('products/create', 'Products::create');
$routes->post('products/store', 'Products::store');

$routes->get('products/edit/(:num)', 'Products::edit/$1');
$routes->post('products/update/(:num)', 'Products::update/$1');

$routes->get('products/delete/(:num)', 'Products::delete/$1');

$routes->get('products/show/(:num)', 'Products::show/$1');

$routes->get('categories', 'Categories::index');
$routes->get('/categories/create', 'Categories::create');
$routes->post('/categories/store', 'Categories::store');

$routes->get('/categories/edit/(:num)', 'Categories::edit/$1');
$routes->post('/categories/update/(:num)', 'Categories::update/$1');

$routes->get('/categories/delete/(:num)', 'Categories::delete/$1');
$routes->get('/categories/show/(:num)', 'Categories::show/$1');

$routes->get('suppliers','Suppliers::index');

$routes->get('suppliers/create','Suppliers::create');

$routes->post('suppliers/store','Suppliers::store');

$routes->get('suppliers/show/(:num)','Suppliers::show/$1');

$routes->get('suppliers/edit/(:num)','Suppliers::edit/$1');

$routes->post('suppliers/update/(:num)','Suppliers::update/$1');

$routes->get('suppliers/delete/(:num)','Suppliers::delete/$1');