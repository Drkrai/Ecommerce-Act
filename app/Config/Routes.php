<?php

use CodeIgniter\Router\RouteCollection;
 
/**
 * @var RouteCollection $routes
 */
$routes->get('/loginView', 'UserController::index');
 $routes->get('/', 'UserController::index');
$routes->get('/adminView', 'AdminController::adminView',['filter'=>'adminGuard']);
$routes->post('/save', 'AdminController::insertProduct');
$routes->get('/addProduct', 'AdminController::showInsertProduct');
$routes->get('/user', 'UserController::userView',['filter'=>'authGuard']);
$routes->get('/productView/(:any)', 'UserController::viewProduct/$1');
$routes->get('/signup', 'UserController::register');
$routes->match(['get','post'],'/signUp', 'UserController::registerAuth');
$routes->match(['get','post'],'UserController/loginAuth', 'UserController::loginAuth');
$routes->get('/delete/(:any)', 'AdminController::delete/$1');
$routes->get('/adminSignin', 'AdminController::register');
$routes->match(['get','post'],'/AdminSignUp', 'AdminController::registerAdmin');
$routes->get('/adminLogin', 'AdminController::Adminlogin');
$routes->match(['get','post'],'AdminController/loginAdmin', 'AdminController::loginAdmin');

