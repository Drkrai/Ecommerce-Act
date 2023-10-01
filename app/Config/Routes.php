<?php

use CodeIgniter\Router\RouteCollection;
 
/**
 * @var RouteCollection $routes
 */

 $routes->get('/loginView', 'UserController::index');
$routes->get('/adminView', 'AdminController::adminView',['filter'=>'authGuard']);
$routes->post('/save', 'AdminController::insertProduct');
$routes->get('/addProduct', 'AdminController::showInsertProduct');
$routes->get('/user', 'UserController::userView',['filter'=>'authGuard']);
$routes->get('/productView', 'UserController::viewProduct');
$routes->get('/signup', 'UserController::register');
$routes->match(['get','post'],'/signUp', 'UserController::registerAuth');
$routes->match(['get','post'],'UserController/loginAuth', 'UserController::loginAuth');
$routes->get('/delete/(:any)', 'AdminController::delete/$1');

