<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Modules');
$routes->setDefaultController('Frontpage');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Frontpage\Controllers\Frontpage::index');

$routes->get('/tentangkami', 'Frontpage\Controllers\Frontpage::tentang_kami');

$routes->get('/register/oa', 'Frontpage\Controllers\Frontpage::registrasi');
$routes->post('/register_user', 'Frontpage\Controllers\Frontpage::registrasi_user');
$routes->get('/register/oa/(:any)', 'Frontpage\Controllers\Frontpage::registrasi/$1');

$routes->get('/artikel', 'Frontpage\Controllers\Frontpage::list_article');
$routes->get('/detailartikel/(:any)', 'Frontpage\Controllers\Frontpage::detail_article/$1');

$routes->get('/edukasi', 'Frontpage\Controllers\Frontpage::list_edukasi');
$routes->get('/detailedukasi/(:any)', 'Frontpage\Controllers\Frontpage::detail_edukasi/$1');
$routes->get('/filteredukasi', 'Frontpage\Controllers\Frontpage::filter_edukasi');
$routes->post('/filteredukasi', 'Frontpage\Controllers\Frontpage::filter_edukasi');

$routes->get('/berita', 'Frontpage\Controllers\Frontpage::list_berita');
$routes->get('/detailberita/(:any)', 'Frontpage\Controllers\Frontpage::detail_berita/$1');

$routes->get('/hubungikami', 'Frontpage\Controllers\Frontpage::hubungi_kami');

$routes->post('/save_hubungi_kami', 'Frontpage\Controllers\Frontpage::save_hubungi');

$routes->post('/upload/attachment', '\App\Controllers\Upload::attachment');
$routes->get('/open_attachment', '\App\Controllers\Upload::open_attachment');
$routes->get('/region', '\App\Controllers\Home::getRegion');
$routes->get('/sync', '\App\Controllers\Home::syncDataUsersLama');

$routes->post('/save_subscriber', 'Frontpage\Controllers\Frontpage::save_subscriber');
$routes->post('/save_region', 'Frontpage\Controllers\Frontpage::saveRegion');

$routes->get('/getReferalPssi/(:any)', 'Api\Controllers\Api::referalId/$1');

//lomba
$routes->get('/lomba', 'Lomba\Controllers\Lomba::index');
$routes->post('/lomba/save', 'Lomba\Controllers\Lomba::save');
$routes->post('/lomba/cekid', 'Lomba\Controllers\Lomba::cekid');
$routes->post('/lomba/cek_harga', 'Lomba\Controllers\Lomba::cek_harga');

$routes->get('/lomba/selamat', 'Lomba\Controllers\Lomba::selamat');
$routes->get('/lomba/konfirmasi', 'Lomba\Controllers\Lomba::konfirmasi');
$routes->post('/lomba/konfirm_save', 'Lomba\Controllers\Lomba::konfirm_save');
$routes->get('/lomba/finish', 'Lomba\Controllers\Lomba::finish');

//edukasi
$routes->get('/edukasi/(:any)', 'Edukasi\Controllers\Edukasi::index/$1');
$routes->get('/edukasi/(:any)/(:any)', 'Edukasi\Controllers\Edukasi::index/$1/$2');
$routes->post('/edukasi/save', 'Edukasi\Controllers\Edukasi::save');

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
$routes->group('/admin', function($routes){
    $routes->group('manage/users', function($routes){
        $module = 'Users\Controllers\Users';
        $routes->get('/', $module."::index");
        $routes->get('form', $module."::form");
        $routes->get('form/(:any)', $module."::form/$1");
        $routes->post('save/(:any)', $module."::save/$1");
        $routes->post('delete', $module."::delete_user");

    });  
    $routes->group('dashboard', function($routes){
        $module = 'Dashboard\Controllers\Dashboard';
        $routes->get('/', $module."::index");
        $routes->get('form', $module."::form");
        $routes->get('form/(:any)', $module."::form/$1");
        $routes->post('save/(:any)', $module."::save/$1");
        $routes->post('delete', $module."::delete_user");

    });  
    $routes->group('manage/subscribers', function($routes){
        $module = 'Subscribers\Controllers\Subscribers';
        $routes->get('/', $module."::index");
        $routes->post('delete/(:any)', $module."::delete/$1");

    });
    $routes->group('manage/members', function($routes){
        $module = 'Customers\Controllers\Customers';
        $routes->get('/', $module."::index");
        $routes->get('form', $module."::form");
        $routes->get('form/(:any)', $module."::form/$1");
        $routes->post('save', $module."::save");
        $routes->post('save/(:any)', $module."::save/$1");
        $routes->post('delete/(:any)', $module."::delete/$1");
        $routes->get('detail/(:any)', $module."::detail/$1");
        $routes->get('detail_referal/(:any)', $module."::detail_referal/$1");
        $routes->get('export_excel', $module."::export_excel");

    });  
    $routes->group('manage/roles', function($routes){
        $module = 'Users\Controllers\Users';
        $routes->get('/', $module."::index_role");
        $routes->get('form', $module."::role_form");
        $routes->get('form/(:any)', $module."::role_form/$1");
    });   
    $routes->group('content/berita', function($routes){
        $module = 'Berita\Controllers\Berita';
        $routes->get('/', $module."::index");
        $routes->get('form', $module."::role_form");
        $routes->get('form/(:any)', $module."::role_form/$1");
    }); 
    $routes->group('content/articles', function($routes){
        $module = 'Articles\Controllers\Articles';
        $routes->get('/', $module."::index");
        $routes->get('form', $module."::form");
        $routes->get('form/(:any)', $module."::form/$1");
        $routes->post('saveForm/(:any)', $module."::saveForm/$1");
        $routes->post('delete/(:any)', $module."::delete/$1");

    }); 
    $routes->group('content/acara', function($routes){
        $module = 'Acara\Controllers\Acara';
        $routes->get('/', $module."::index");
        $routes->get('form', $module."::form");
        $routes->get('form/(:any)', $module."::form/$1");
        $routes->post('saveForm/(:any)', $module."::saveForm/$1");
        $routes->post('delete/(:any)', $module."::delete/$1");
    }); 
    $routes->group('content/headers', function($routes){
        $module = 'Headers\Controllers\Headers';
        $routes->get('/', $module."::index");
        $routes->get('form', $module."::form");
        $routes->get('form/(:any)', $module."::form/$1");
        $routes->post('saveForm/(:any)', $module."::saveForm/$1");
        $routes->post('delete/(:any)', $module."::delete/$1");
    }); 
    $routes->group('auth', function($routes){
        $module = 'Authentication\Controllers\Authentication';
        $routes->get('/', $module."::index");
        $routes->get('logout', $module."::logout_attempt");
        $routes->post('login_attempt', $module."::login_attempt");
    });

    //cms lomba
    $routes->group('manage/lomba', function($routes){
        $module = 'Lomba\Controllers\CmsLomba';
        $routes->get('/', $module."::index");
        $routes->get('peserta', $module."::peserta");
        $routes->post('delete/(:any)', $module."::delete/$1");
        $routes->get('detail/(:any)', $module."::detail/$1");
        $routes->get('export_excel', $module."::export_excel");
        $routes->get('export_peserta', $module."::export_peserta");

        $routes->get('konfirmasi', $module."::konfirmasi");
        $routes->get('detail_konfirmasi/(:any)', $module."::detail_konfirmasi/$1");
        $routes->post('delete_konfirmasi/(:any)', $module."::delete_konfirmasi/$1");
        $routes->post('pay/(:num)', $module."::pay/$1");
    });

    //cms edukasi
    $routes->group('manage/edukasi', function($routes){
        $module = 'Edukasi\Controllers\CmsEdukasi';
        $routes->get('/', $module."::index");
        $routes->get('create', $module."::create");
        $routes->get('create/(:any)', $module."::create/$1");
        $routes->post('saveForm/(:any)', $module."::saveForm/$1");
        $routes->post('delete_edukasi/(:any)', $module."::delete_edukasi/$1");

        $routes->get('peserta/(:num)', $module."::peserta/$1");
        $routes->get('peserta_all', $module."::peserta_all");
        $routes->get('peserta_all/export', $module."::peserta_all_export");
        $routes->post('peserta/delete', $module."::peserta_delete");
    });
});
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
