<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#INICIO
$routes->get('/inguz/index', 'Home::index');

#USUARIO
$routes->get('/formularios/ingreso', 'Home::ingreso');
$routes->post('/home/login', 'Home::login');
$routes->get('/formularios/registro', 'Home::registro');
$routes->get('/usuario/create', 'Usuario::create');
$routes->post('/usuario/create', 'Usuario::create'); 

#INSTRUCTOR
$routes->get('/formularios/opc_instructor', 'Home::instructor');
$routes->get('/formularios/ingresoinstructor', 'Home::ingreso_instructor');
$routes->get('/formularios/ingresoinstructor', 'Home::logininstructor');
$routes->post('/home/logininstructor', 'Home::logininstructor');
$routes->get('/formularios/registroinstructor', 'Home::registroadmin');
$routes->get('/instructor/create', 'Instructor::create');
$routes->post('/instructor/create', 'Instructor::create'); 

#USUARIO - INSTRUCTOR
$routes->get('/salir', 'Home::salir');
$routes->get('/formularios/recuperar_contra', 'Home::recuperarcontra');

#NAVBAR
$routes->get('/inguz/informacion','Home::informacion');
$routes->get('/inguz/actividades','Home::actividades');
$routes->get('/inguz/reserva','Home::reserva');

#ACTIVIDADES
$routes->get('/actividades/reformer','Actividades::reformer');
$routes->get('/actividades/hiit','Actividades::hiit');
$routes->get('/actividades/terapeutico','Actividades::terapeutico');

$routes->get('/actualizar/actualizar_reformer', 'Actividades::actualizar_reformer');
$routes->post('/actualizar/actualizar_reformer', 'Actividades::updateReformer');

$routes->get('/actualizar/hiit','Actividades::actualizar_hiit');
$routes->get('/actualizar/terapeutico','Actividades::actualizar_terapeutico');