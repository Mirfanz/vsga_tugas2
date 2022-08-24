<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('login', 'Account::index');
$routes->get('logout', 'Account::logout');
$routes->get('register', 'Account::register');
$routes->get('register2', 'Account::register2');
$routes->post('login', 'Account::commitLogin');
$routes->post('register', 'Account::commitRegister');
$routes->post('register2', 'Account::commitRegister2');
$routes->get('login-manajemen', 'Account::loginManajemen');

$routes->get('users', 'User::users');
$routes->get('profile', 'User::index');
$routes->get('profile/(:segment)', 'User::profile/$1');
$routes->get('edit-profile', 'User::editProfile');
$routes->post('edit-profile', 'User::commitEditProfile');

$routes->get('portofolio', 'Portofolio::index');
$routes->get('portofolio/post', 'Portofolio::addPortofolio');
$routes->post('portofolio/post', 'Portofolio::commitAddPortofolio');
$routes->get('portofolio/(:segment)', 'Portofolio::portofolio/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
