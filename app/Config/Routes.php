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

// Home
$routes->get('/', 'Home::index', ['as' => 'home']);

/**
 * Auth routes
 */
$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    // Login/out
    $routes->get('login', 'AuthController::login', ['as' => 'login']);
    $routes->post('login', 'AuthController::attemptLogin');
    $routes->get('logout', 'AuthController::logout');

    // Registration
    $routes->get('register', 'AuthController::register', ['as' => 'register']);
    $routes->post('register', 'AuthController::attemptRegister');

    // Activation
    $routes->get('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account']);
    $routes->get('resend-activate-account', 'AuthController::resendActivateAccount', ['as' => 'resend-activate-account']);

    // Forgot/Resets
    $routes->get('forgot', 'AuthController::forgotPassword', ['as' => 'forgot']);
    $routes->post('forgot', 'AuthController::attemptForgot');
    $routes->get('reset-password', 'AuthController::resetPassword', ['as' => 'reset-password']);
    $routes->post('reset-password', 'AuthController::attemptReset');
});

// Admin routes
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

    // Home
    $routes->group('', ['namespace' => 'App\Controllers\Admin\Home'], function ($routes) {
        $routes->get('/', 'Home::index', ['as' => 'admin.home']);
    });

    // Kelas
    $routes->group('kelas', ['namespace' => 'App\Controllers\Admin\Kelas'], function ($routes) {
        $routes->get('/', 'KelasController::index', ['as' => 'admin.kelas.index']);
        $routes->post('/', 'KelasController::create', ['as' => 'admin.kelas.create']);
        $routes->get('new', 'KelasController::new', ['as' => 'admin.kelas.new']);
        $routes->get('select', 'KelasController::select', ['as' => 'admin.kelas.select']);
        $routes->get('data', 'KelasController::data', ['as' => 'admin.kelas.data']);
        $routes->get('(:segment)', 'KelasController::show/$1', ['as' => 'admin.kelas.show']);
        $routes->get('(:segment)/edit', 'KelasController::edit/$1', ['as' => 'admin.kelas.edit']);
        $routes->post('(:segment)/update', 'KelasController::update/$1', ['as' => 'admin.kelas.update']);
        // $routes->patch('(:segment)', 'KelasController::update/$1', ['as' => 'admin.kelas.update']);
        $routes->get('(:segment)/delete', 'KelasController::delete/$1', ['as' => 'admin.kelas.delete']);
    });

    // Siswa
    $routes->group('siswa', ['namespace' => 'App\Controllers\Admin\Siswa'], function ($routes) {
        $routes->get('/', 'SiswaController::index', ['as' => 'admin.siswa.index']);
        $routes->post('/', 'SiswaController::create', ['as' => 'admin.siswa.create']);
        $routes->get('new', 'SiswaController::new', ['as' => 'admin.siswa.new']);
        $routes->get('select', 'SiswaController::select', ['as' => 'admin.siswa.select']);
        $routes->get('data', 'SiswaController::data', ['as' => 'admin.siswa.data']);
        $routes->get('(:segment)', 'SiswaController::show/$1', ['as' => 'admin.siswa.show']);
        $routes->get('(:segment)/edit', 'SiswaController::edit/$1', ['as' => 'admin.siswa.edit']);
        $routes->post('(:segment)/update', 'SiswaController::update/$1', ['as' => 'admin.siswa.update']);
        // $routes->patch('(:segment)', 'SiswaController::update/$1', ['as' => 'admin.siswa.update']);
        $routes->get('(:segment)/delete', 'SiswaController::delete/$1', ['as' => 'admin.siswa.delete']);
    });

    // Guru
    $routes->group('guru', ['namespace' => 'App\Controllers\Admin\Guru'], function ($routes) {
        $routes->get('/', 'GuruController::index', ['as' => 'admin.guru.index']);
        $routes->post('/', 'GuruController::create', ['as' => 'admin.guru.create']);
        $routes->get('new', 'GuruController::new', ['as' => 'admin.guru.new']);
        $routes->get('select', 'GuruController::select', ['as' => 'admin.guru.select']);
        $routes->get('data', 'GuruController::data', ['as' => 'admin.guru.data']);
        $routes->get('(:segment)', 'GuruController::show/$1', ['as' => 'admin.guru.show']);
        $routes->get('(:segment)/edit', 'GuruController::edit/$1', ['as' => 'admin.guru.edit']);
        $routes->post('(:segment)/update', 'GuruController::update/$1', ['as' => 'admin.guru.update']);
        // $routes->patch('(:segment)', 'GuruController::update/$1', ['as' => 'admin.guru.update']);
        $routes->get('(:segment)/delete', 'GuruController::delete/$1', ['as' => 'admin.guru.delete']);
    });
    // Mapel
    /* ... */

    // Materi
    /* ... */
});

// Guru
$routes->group('guru', ['namespace' => 'App\Controllers\Guru'], function ($routes) {

    // Kelas
    /* ... */

    // Siswa
    /* ... */

    // Guru
    /* ... */

    // Mapel
    /* ... */

    // Materi
    /* ... */
});

// Siswa
$routes->group('siswa', ['namespace' => 'App\Controllers\Siswa'], function ($routes) {

    // Kelas
    /* ... */

    // Siswa
    /* ... */

    // Guru
    /* ... */

    // Mapel
    /* ... */

    // Materi
    /* ... */
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
