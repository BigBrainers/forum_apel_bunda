<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

$routes->get('/login', 'Login::index', ['filter' => 'logincheck']);
$routes->post('login/proceed', 'Login::proceed');
$routes->get('/logout', 'Login::logout', ['filter' => 'logoutcheck']);


$routes->get('/admin', 'AdminController::index', ['filter' =>  'admincheck']);
$routes->get('/user', 'UserController::index', ['filter' =>  'usercheck']);

$routes->get('/regiter', 'Register::index', ['filter' =>  'logincheck']);
$routes->get('/regiter/usercheck', 'Register::usercheck');
$routes->get('/regiter/proceed', 'Register::proceed', ['filter' =>  'logincheck']);

$routes->post('admin/postquestion', 'AdminController::questionPost');
$routes->post('user/postquestion', 'UserController::questionPost');

$routes->post('admin/deletequestion', 'AdminController::deletePost');

$routes->post('user/editquestion', 'UserController::questionEdit');

// $routes->group('products', ['filter' => 'ceklogin'], function($routes) {
//     $routes->get('/', 'Products::index');
//     $routes->get('products/add', 'Products::add');
//     $routes->post('products/store', 'Products::store');
// });
/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');


/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
