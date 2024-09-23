<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#INICIO
$routes->get('/inguz/index', 'Home::index');
#REGISTRO-INGRESO
$routes->get('/formularios/ingreso', 'Home::login');
$routes->get('/formularios/ingresoadmi', 'Home::loginadmin');
$routes->get('/formularios/recuperar_contra', 'Home::recuperarcontra');
$routes->get('/formularios/registro', 'Home::registro');



