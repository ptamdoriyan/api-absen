<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('absen');
$routes->resource('absensiang');
$routes->resource('pegawai');
$routes->resource('checkin');
