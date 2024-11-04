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
$routes->get('/usuario/perfil', 'Usuario::perfil'); 
$routes->post('/usuario/perfil', 'Usuario::update'); 
#HISTORIAL USUARIO
$routes->get('/usuario/membresias', 'Usuario::membresia');
$routes->get('/usuario/reservas', 'Usuario::reserva');
#INSTRUCTOR
$routes->get('/formularios/opc_instructor', 'Home::instructor');
$routes->get('/formularios/ingresoinstructor', 'Home::ingreso_instructor');
$routes->get('/formularios/ingresoinstructor', 'Home::logininstructor');
$routes->post('/home/logininstructor', 'Home::logininstructor');
$routes->get('/formularios/registroinstructor', 'Home::registroadmin');
$routes->get('/instructor/create', 'Instructor::create');
$routes->post('/instructor/create', 'Instructor::create'); 
$routes->get('/instructor/perfil', 'Instructor::perfil');
$routes->post('/instructor/perfil', 'Instructor::update');
#--PANEL 
$routes->get('/instructor/panel', 'Instructor::reservas');

#USUARIO - INSTRUCTOR
$routes->get('/salir', 'Home::salir');
$routes->get('/formularios/recuperar_contra', 'Home::recuperarcontra');

#NAVBAR
$routes->get('/inguz/informacion','Home::informacion');
$routes->get('/inguz/actividades','Home::actividades');
$routes->get('/inguz/reserva','Home::reserva');

#CREDITOS
$routes->get('/formularios/creditos', 'Home::creditos');
$routes->post('/creditos/create', 'Creditos::create'); 
$routes->get('/creditos/confirmacion', 'Creditos::confirmacion');
$routes->get('/creditos/update/(:num)', 'Creditos::creditosupdate/$1'); // Para mostrar el formulario de actualización
$routes->post('/creditos/update/(:num)', 'Creditos::update/$1'); // Para procesar la actualización
$routes->get('/creditos/guardar', 'Creditos::guardar'); 

#ACTUALIZAR ESTADO CREDITOS
$routes->get('/creditos/membresia_espera', 'Creditos::pago_espera');
$routes->get('creditos/aprobar_pago/(:num)', 'Creditos::aprobar_pago/$1');
$routes->get('creditos/rechazar_pago/(:num)', 'Creditos::rechazar_pago/$1');

$routes->get('/creditos/membresia_activa', 'Creditos::membresia_activa');
$routes->get('/creditos/membresia_rechazada', 'Creditos::membresia_rechazada');
$routes->get('/creditos/membresia_vencida', 'Creditos::membresia_vencida');
#ACTIVIDADES
$routes->get('/actividades/reformer','Actividades::reformer');
$routes->get('/actividades/hiit','Actividades::hiit');
$routes->get('/actividades/terapeutico','Actividades::terapeutico');

$routes->get('/actualizar/actualizar_reformer', 'Actividades::actualizar_reformer');
$routes->post('/actualizar/actualizar_reformer', 'Actividades::updateReformer');

$routes->get('/actualizar/hiit','Actividades::actualizar_hiit');
$routes->post('/actualizar/hiit', 'Actividades::updateHiit');

$routes->get('/actualizar/terapeutico','Actividades::actualizar_terapeutico');
$routes->post('/actualizar/terapeutico', 'Actividades::updateTerapeutico');

#INFORMACION
$routes->get('/actualizar/informacion','Actividades::informacion');
$routes->post('/actualizar/informacion', 'Actividades::updateInformacion');

#RESERVAS
$routes->get('/reservas/reservas', 'Reserva::reserva');
$routes->get('/reserva/create', 'Reserva::create');
$routes->post('/reserva/create', 'Reserva::create'); 
$routes->get('/reserva/update', 'Reserva::update');
$routes->post('/reserva/update', 'Reserva::update'); 