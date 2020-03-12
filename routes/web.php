<?php
/*
|--------------------------------------------------------------------------
| RUTAS PUBLICAS
|--------------------------------------------------------------------------
|
*/


// RETORNA VISTA DEL INICIO
Route::get('/inicio', 'HomeController@index')->name('/inicio');
Route::get('/home', 'HomeController@index')->name('/home');
Route::get('/', 'HomeController@index')->name('/');

// RETORNA LA VISTA DE CONSULTAR USUARIOS
Route::get('/usuarios', 'UsuariosController@index')->name('/usuarios');

// RETORNA LA VISTA DEL MODAL CON LA INFORMACIÓN DEL USUARIO
Route::post('/usuarios/detalle/{id}', 'UsuariosController@detalle')->name('/usuarios/detalle/{id}');

// RETORNA LA VISTA DE REGISTRARSE
Route::get('/registrarse','UsuariosController@registrarse')->name('/registrarse');

/*
|--------------------------------------------------------------------------
| RUTAS PRIVADAS
|--------------------------------------------------------------------------
|
*/


// ----MODULO DE SESIÓN

// CAMBIA LA CONTRASEÑA DEL USUARIO QUE HAYA INICIADO SESIÓN
Route::post('/passreset/{id}', 'UsuariosController@cambiar_password')->name('/passreset/{id}');

// ----MODULO USUARIO

Auth::routes();
// ACTUALIZA LA INFORMACIÓN DEL USUARIO

Route::post('/usuarios/update/{id}', 'UsuariosController@update')->name('/usuarios/update/{id}')->middleware('auth');

// CAMBIA EL ESTADO DEL USUARIO A ACTIVO
Route::post('/usuarios/activar/{id}', 'UsuariosController@activar')->name('/usuarios/activar/{id}')->middleware('auth');

// CAMBIA EL ESTADO DEL USUARIO A INACTIVO
Route::post('/usuarios/inactivar/{id}', 'UsuariosController@inactivar')->name('/usuarios/inactivar/{id}')->middleware('auth');

// RETORNA LA VISTA DE CONSULTAR USUARIOS
Route::get('/usuarios/registrar', 'UsuariosController@registrar')->name('/usuarios/registrar')->middleware('auth')->middleware('auth');

// RETORNA LA VISTA DE CONSULTAR USUARIOS
Route::get('/registrar', 'UsuariosController@registrar')->name('/registrar')->middleware('auth');

// RETORNA MODAL PARA REGISTRAR USUARIO
Route::post('/registrar/nuevo', 'UsuariosController@nuevoUsuario')->name('/registrar/nuevo')->middleware('auth');

// GUARDA LA INFORMACIÓN DEL MODAL EN LA BASE DE DATOS
Route::post('/registrar/guardar/{id}', 'UsuariosController@guardar')->name('/registrar/guardar');

// GUARDA CARGA MASIVA
Route::POST('/cargaMasiva', 'UsuariosController@cargaMasiva')->name('/carga/Masiva/{id}')->middleware('auth');


// ------ MODULO CONTACTOS

// RETORNA EL MODAL CON LA INFORMACIÓN
Route::post('/usuarios/contacto/{id}', 'UsuariosController@detalleContacto')->name('/usuarios/contactos');

// ACTUALIZA EL CONTACTO
Route::post('/contacto/update/{id}', 'UsuariosController@updateContacto')->name('/usuarios/contactos')->middleware('auth');

// GUARDAR CONTACTO
Route::post('/contacto/guardar/{id}', 'UsuariosController@guardarContacto')->name('/usuarios/contactos')->middleware('auth');

