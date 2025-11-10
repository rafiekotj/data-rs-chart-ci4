<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/bar/(:segment)', 'Dashboard::getBarData/$1');
$routes->get('/dashboard/line/(:segment)', 'Dashboard::getLineData/$1');
$routes->get('dashboard/getKabupatenByProvinsi', 'Dashboard::getKabupatenByProvinsi');
$routes->get('dashboard/getDropdownList/(:segment)', 'Dashboard::getDropdownList/$1');
$routes->get('dashboard/getFilteredTable', 'Dashboard::getFilteredTable');
$routes->get('dashboard/exportCsv', 'Dashboard::exportCsv');
$routes->get('dashboard/exportXls', 'Dashboard::exportXls');

$routes->get('datars', 'Datars::index');