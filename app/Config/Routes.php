<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

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
    });

    // Route memberships
    $routes->group('memberships', static function ($routes) {
        $routes->get('', 'MembershipController::index');
        $routes->get('(:num)', 'MembershipController::show/$1');
        $routes->get('(:num)/edit', 'MembershipController::edit/$1');
        $routes->put('(:num)/edit', 'MembershipController::update');
        $routes->delete('delete/(:num)', 'MembershipController::destroy/$1');
    });
});
