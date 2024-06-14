<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('my-membership', 'Home::membership');

$routes->group('admin', ['filter' => 'role:admin'], static function ($routes) {
    // Route Dashboard
    $routes->get('', 'DashboardController::index');

    // Route packages
    $routes->group('packages', static function ($routes) {
        $routes->get('', 'PackageController::index');
        $routes->get('create', 'PackageController::create');
        $routes->post('create', 'PackageController::store');
        $routes->get('(:num)/edit', 'PackageController::edit/$1');
        $routes->put('(:num)/edit', 'PackageController::update');
        $routes->delete('delete/(:num)', 'PackageController::destroy/$1');
        $routes->get('export-pdf', 'PackageController::exportPdf');
        $routes->get('export-excel', 'PackageController::exportExcel');
    });

    // Route memberships
    $routes->group('memberships', static function ($routes) {
        $routes->get('', 'MembershipController::index');
        $routes->get('(:num)', 'MembershipController::show/$1');
        $routes->get('(:num)/edit', 'MembershipController::edit/$1');
        $routes->put('(:num)/edit', 'MembershipController::update');
        $routes->delete('delete/(:num)', 'MembershipController::destroy/$1');
        $routes->get('export-pdf', 'MembershipController::exportPdf');
        $routes->get('export-excel', 'MembershipController::exportExcel');
    });

    // Route users
    $routes->group('users', static function ($routes) {
        $routes->get('', 'UserController::index');
        $routes->get('export-pdf', 'UserController::exportPdf');
        $routes->get('export-excel', 'UserController::exportExcel');
    });

    // Route payments
    $routes->group('payments', static function ($routes) {
        $routes->get('', 'PaymentController::index');
        $routes->get('(:num)', 'PaymentController::show/$1');
        $routes->get('create/(:num)', 'PaymentController::create/$1');
        $routes->post('create', 'PaymentController::store');
        $routes->get('export-pdf', 'PaymentController::exportPdf');
        $routes->get('export-excel', 'PaymentController::exportExcel');
    });
});
