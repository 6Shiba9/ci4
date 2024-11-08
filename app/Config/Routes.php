<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('Modules\Login\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


$routes->group('page', ['namespace' => 'Modules\Login\Controllers'], function ($routes) {

    $routes->get('login','Login::index');
    $routes->post('auth','Login::auth');
    $routes->get('register','Register::index');
    $routes->post('save_data', 'Register::save');

});



$routes->group('Manage', ['namespace' => 'Modules\Users\Controllers', 'filter' => 'auth'], function ($routes) {

    $routes->get('namelist', 'User::index'); // แสดงรายการชื่อทั้งหมด
    $routes->get('addname', 'User::createdata'); // แสดงหน้าเพิ่มชื่อใหม่
    $routes->post('submit-form', 'User::store');// บันทึก
    $routes->get('editdata/(:num)', 'User::singleUser/$1');// แสดงหน้าแก้ไข
    $routes->post('update-form', 'User::update_data');// แก้ไข
    $routes->get('deletdata/(:num)', 'User::deletedata/$1');// ลบชื่อ
    $routes->get('generate', 'User::generate');// สร้าง pdf

});
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Dashborad

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
