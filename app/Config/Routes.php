<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/data-gis-extrak', 'Home::gis_extrak');
$routes->get('/data-gis-data', 'Home::gis_data');
$routes->post('/get-coordinat', 'Home::getCoordinat');