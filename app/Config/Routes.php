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

$routes->post('demo/admin', 'AuthController::demoAdmin');

$routes->post('demo/cashier', 'AuthController::demoCashier');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

$routes->get('dashboard', 'Home::index');


/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/

$routes->get('products', 'Products::index');

$routes->get('products/create', 'Products::create');

$routes->post('products/store', 'Products::store');

$routes->get('products/edit/(:num)', 'Products::edit/$1');

$routes->post('products/update/(:num)', 'Products::update/$1');

$routes->get('products/delete/(:num)', 'Products::delete/$1');


/*
|--------------------------------------------------------------------------
| Categories
|--------------------------------------------------------------------------
*/

$routes->get('categories', 'Categories::index');

$routes->get('categories/create', 'Categories::create');

$routes->post('categories/store', 'Categories::store');

$routes->get('categories/edit/(:num)', 'Categories::edit/$1');

$routes->post('categories/update/(:num)', 'Categories::update/$1');

$routes->get('categories/delete/(:num)', 'Categories::delete/$1');


/*
|--------------------------------------------------------------------------
| Suppliers
|--------------------------------------------------------------------------
*/

$routes->get('suppliers', 'Suppliers::index');

$routes->get('suppliers/create', 'Suppliers::create');

$routes->post('suppliers/store', 'Suppliers::store');

$routes->get('suppliers/edit/(:num)', 'Suppliers::edit/$1');

$routes->post('suppliers/update/(:num)', 'Suppliers::update/$1');

$routes->get('suppliers/delete/(:num)', 'Suppliers::delete/$1');


/*
|--------------------------------------------------------------------------
| Inventory
|--------------------------------------------------------------------------
*/

$routes->get('inventory', 'Inventory::index');


/*
|--------------------------------------------------------------------------
| Purchases
|--------------------------------------------------------------------------
*/

$routes->get('purchases', 'PurchaseController::index');

$routes->get('purchases/create', 'PurchaseController::create');

$routes->post('purchases/store', 'PurchaseController::store');

$routes->get('purchases/edit/(:num)', 'PurchaseController::edit/$1');

$routes->post('purchases/update/(:num)', 'PurchaseController::update/$1');

$routes->get('purchases/delete/(:num)', 'PurchaseController::delete/$1');


/*
|--------------------------------------------------------------------------
| Customers
|--------------------------------------------------------------------------
*/

$routes->get('customers', 'CustomerController::index');

$routes->get('customers/create', 'CustomerController::create');

$routes->post('customers/store', 'CustomerController::store');

$routes->get('customers/edit/(:num)', 'CustomerController::edit/$1');

$routes->post('customers/update/(:num)', 'CustomerController::update/$1');

$routes->get('customers/delete/(:num)', 'CustomerController::delete/$1');


/*
|--------------------------------------------------------------------------
| Invoices
|--------------------------------------------------------------------------
*/

$routes->get('invoices', 'InvoiceController::index');

$routes->get('invoices/(:num)', 'InvoiceController::show/$1');


/*
|--------------------------------------------------------------------------
| POS
|--------------------------------------------------------------------------
*/

$routes->get('pos', 'PosController::index');


/*
|--------------------------------------------------------------------------
| Cart
|--------------------------------------------------------------------------
*/

$routes->post('cart/add', 'CartController::add');

$routes->post('cart/update', 'CartController::update');

$routes->post('cart/remove', 'CartController::remove');

$routes->post('cart/clear', 'CartController::clear');


/*
|--------------------------------------------------------------------------
| Checkout
|--------------------------------------------------------------------------
*/

$routes->get('checkout', 'CheckoutController::checkout');

$routes->post('checkout', 'CheckoutController::checkout');

$routes->post('checkout/draft', 'CheckoutController::draft');

$routes->get('checkout/resume/(:num)', 'CheckoutController::resume/$1');


/*
|--------------------------------------------------------------------------
| Sales History
|--------------------------------------------------------------------------
*/
$routes->get('sales', 'SalesHistoryController::index');