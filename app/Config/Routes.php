<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'AdminController::productList');
$routes->post('/save', 'AdminController::insertProduct');
$routes->get('/addProduct', 'AdminController::showInsertProduct');
$routes->get('/', 'UserController::index');
$routes->get('/productView', 'UserController::viewProduct');
$routes->get('/signup', 'UserController::register');
$routes->post('/signUp', 'UserController::registerAuth');
$routes->get('/loginView', 'UserController::login');
$routes->post('/login', 'UserController::loginAuth');
$routes->get('/delete/(:any)', 'AdminController::delete/$1');

