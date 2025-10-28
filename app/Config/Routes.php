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
$routes->get('dashboard/getTableData', 'Dashboard::getTableData');
$routes->get('dashboard/exportCSV', 'Dashboard::exportCSV');
$routes->get('dashboard/exportXLS', 'Dashboard::exportXLS');

$routes->get('datars', 'Datars::index');