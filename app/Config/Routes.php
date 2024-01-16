<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'LoginController::index');
// $routes->post('login', 'LoginController::login');
// $routes->post('logout','LoginController::index');
$routes->get('/', 'LoginController::index');
$routes->post('login', 'LoginController::login');
$routes->get('logout', 'LoginController::logout');
$routes->get('dashboard', 'DashBoardController::index');

$routes->get('header', 'HeaderController::index');
$routes->post('addHeader', 'HeaderController::addHeader');
$routes->get('header/deleteHeader/(:num)', 'HeaderController::deleteHeader/$1');
$routes->post('header/updateHeader/(:num)', 'HeaderController::updateHeader/$1');
//works
$routes->get('slidertable', 'SliderController::index');
$routes->post('addSlider', 'SliderController::addSlider');
$routes->get ('slidertable/deleteSlider/(:num)', 'SliderController::deleteSlider/$1');
$routes->post('slidertable/updateSlider/(:num)', 'SliderController::updateSlider/$1');

//now works
$routes->get('product', 'ProductController::index');
$routes->post('addProduct', 'ProductController::addProduct');
$routes->get('product/deleteProduct/(:num)', 'ProductController::deleteProduct/$1');
$routes->post('product/updateProduct/(:num)', 'ProductController::updateProduct/$1');








