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
$routes->get('/register', 'Auths::index');
$routes->post('/register', 'Auths::register');
$routes->get('/login', 'Auths::login');
$routes->post('/login/proccess', 'Auths::login_action');
$routes->get('/logout/user', 'Auths::logout_user');
$routes->get('/barang/(:any)/(:any)', 'Home::detail/$1/$2');

// Routing buat Admin
$routes->get('/auth', 'Auth::index');
$routes->post('/auth', 'Auth::auth');
$routes->get('/auth/logout', 'Auth::logout');

$routes->group('admin', ['namespace' => 'App\Controller\Admin'], function ($routes) {
    $routes->get('/dashboard', 'Dashboard::index');

    // Routing buat Stok
    $routes->get('/stok', 'Stok::index');


    $routes->get('/barang', 'Barang::index');
    $routes->get('/barang/add', 'Barang::Add');
    $routes->post('/barang/add', 'Barang::Store');


    $routes->get('/kategori', 'Kategori::index');
    $routes->get('/kategori/add', 'Kategori::add');
    $routes->post('/kategori/add', 'Kategori::store');
    $routes->get('/kategori/edit/(:num)', 'Kategori::edit/$1');
    $routes->post('/kategori/update/(:num)', 'Kategori::update/$1');
    $routes->get('/kategori/delete/(:num)', 'Kategori::delete/$1');

    $routes->get('/stok', 'Stok::index');
    $routes->get('/stok/add', 'Stok::add');
    $routes->post('/stok/add', 'Stok::store');
    $routes->get('/stok/edit/(:num)', 'Stok::edit/$1');
    $routes->post('/stok/update/(:num)', 'Stok::update/$1');
    $routes->get('/stok/delete/(:num)', 'Stok::delete/$1');
});
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
