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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');



//rutas para grocery crud de sistemas
$routes->get('/sistemas','Sistemas::sistemas_management');
$routes->post('/sistemas/(:any)','Sistemas::sistemas_management');
$routes->get('/sistemas/(:any)','Sistemas::sistemas_management');
$routes->get('/sistemas/edit/(:any)','Sistemas::sistemas_management/$1');
$routes->post('/sistemas/edit/(:any)','Sistemas::sistemas_management/$1');

//rutas para grocery crud de subsistemas
$routes->get('/subsistemas','Subsistemas::subsistemas_management');

$routes->post('/subsistemas/(:any)','Subsistemas::subsistemas_management');
$routes->get('/subsistemas/(:any)','Subsistemas::subsistemas_management');
$routes->get('/subsistemas/edit/(:any)','Subsistemas::subsistemas_management/$1');
$routes->post('/subsistemas/edit/(:any)','Subsistemas::subsistemas_management/$1');

$routes->get('/login', 'Login::index');


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
