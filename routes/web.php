<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('admin', 'LoginController@admin');
Route::get('/','LoginController@login');
Route::resource('login','LoginController');
Route::get('logout', 'LoginController@logout');

Route::resource('usuarios','UsuariosController');
Route::get('getUsers','UsuariosController@getUsers');
Route::post('getTipoUsuario','UsuariosController@getTipoUsuario');
Route::post('updateUser','UsuariosController@UpdateUser');


//Route::get('/','UsuariosController@login');

Route::resource('miembros','MiembrosController');
Route::get('getmiembros','MiembrosController@lista');


Route::resource('ministerios','MinisteriosController');
Route::get('ministerio/{id}/miembros', 'MinisteriosController@MiembrosMinisterios');
Route::post('addMRM','MinisteriosController@addMRM');
Route::get('getministerios','MinisteriosController@ministerios');
Route::get('getmrm/{id}','MinisteriosController@getMRM');
Route::put('updateMRM/{id}','MinisteriosController@updateMRM');

Route::resource('mrm','MRMController');

Route::resource('productos','ProductosController');
Route::get('controlProductos', 'ProductosController@controlProductos');

Route::resource('proveedores','ProveedoresController');
Route::post('tipoPago', 'ProveedoresController@tipoPago');
Route::post('provedorTipoPago','ProveedoresController@provedorTipoPago');

Route::resource('rol','RolController');
Route::get('getrol','RolController@roles');

Route::resource('salidaproducto','SalidaProductoController');
Route::resource('tipopago','TipoPagoController');
Route::resource('tipoproducto','TipoProductoController');
