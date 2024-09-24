<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#INICIO
$routes->get('/inguz/index', 'Home::index');
#REGISTRO-INGRESO
$routes->get('/formularios/ingreso', 'Home::ingreso');
$routes->post('/home/login', 'Home::login');

$routes->get('/formularios/ingresoadmi', 'Home::loginadmin');
$routes->get('/formularios/recuperar_contra', 'Home::recuperarcontra');
$routes->get('/formularios/registro', 'Home::registro');
#NAVBAR
$routes->get('/inguz/informacion','Home::informacion');
$routes->get('/inguz/actividades','Home::actividades');
$routes->get('/inguz/reserva','Home::reserva');

#ACTIVIDADES
$routes->get('/actividades/reformer','Actividades::reformer');
$routes->get('/actividades/hiit','Actividades::hiit');
$routes->get('/actividades/terapeutico','Actividades::terapeutico');

