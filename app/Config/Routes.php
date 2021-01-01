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

$routes->get('/register', 'Register::index', ['filter' =>  'logincheck']);
$routes->get('/register/usercheck', 'Register::usernamecheck');
$routes->get('/register/emailcheck', 'Register::emailcheck');
$routes->get('/register/proceed', 'Register::proceed', ['filter' =>  'logincheck']);

$routes->get('qna/(:num)', 'QnaController::index/$1', ['filter' => 'logoutcheck']);
$routes->post('qna/add-answer', 'QnaController::answerPost', ['filter' => 'logoutcheck']);

$routes->group('user', ['filter' =>  'logoutcheck'], function($routes) {
$routes->get('', 'UserController::index');
$routes->post('postquestion', 'UserController::questionPost');
$routes->post('editquestion', 'UserController::questionEdit');
$routes->post('edit-bio', 'UserController::editBio');
$routes->get('profile', 'UserController::profile');
$routes->post('editanswer', 'UserController::editAnswer');
$routes->post('marksolution', 'UserController::markSolution');
$routes->post('revokesolution', 'UserController::revokeSolution');

});

$routes->group('admin', ['filter' => 'admincheck'], function($routes) {
$routes->get('', 'AdminController::index');
$routes->post('deletequestion', 'AdminController::deletePost');
$routes->post('deleteanswer', 'AdminController::deleteAnswer');
});
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
