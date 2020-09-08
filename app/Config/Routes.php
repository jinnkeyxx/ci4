<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('admin', 'Users::index');
$routes->get('logout', 'Users::logout');
$routes->match(['get','post'],'/admin', 'Users::login');
$routes->match(['get','post'],'profile', 'Users::profile');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('user', 'Dashboard::user');
$routes->match(['get','post'],'user', 'Dashboard::adduser');
$routes->get('userdelete/(:num)', 'Dashboard::userdelete/$1');
$routes->match(['get','post'],'useredit/(:num)','Dashboard::useredit/$1');
$routes->get('vietbai', 'Dashboard::vietbai');
$routes->match(['get','post'],'vietbai','Dashboard::vietbai');
$routes->get('useredit/(:num)', 'Dashboard::useredit/$1');
$routes->match(['get','post'],'post','Dashboard::post');
$routes->get('post', 'Dashboard::post');
$routes->get('postdelete/(:num)', 'Dashboard::postdelete/$1');
$routes->match(['get','post'],'postedit/(:num)','Dashboard::postedit/$1');
$routes->get('postedit/(:num)', 'Dashboard::postedit/$1');
$routes->get('contact', 'Dashboard::contact');
$routes->get('feedbackSp', 'Dashboard::feedbackSp');



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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