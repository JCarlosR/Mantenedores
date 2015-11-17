<?php

use App\Producto;

Route::get('/', function () {
    return view('principal');
});


/**
 * CLIENTES
 */

// Mostrar todos los clientes
Route::get('clientes', 'ClientController@getRegistrar');

// Mostrar la edición de un cliente
Route::get('clientes/{id}', 'ClientController@getEditar');

// Agregar un nuevo cliente
Route::post('cliente', 'ClientController@postRegistrar');

// Editar un cliente existente
Route::put('cliente/{id}', 'clientController@putEditar');

// Eliminar un cliente existente
Route::delete('cliente/{id}', 'ClientController@delete');


/**
 * PROVEEDORES
 */

// Mostrar todos los proveedores
Route::get('proveedores', 'ProviderController@getRegistrar');

// Mostrar la edición de un proveedor
Route::get('proveedores/{id}', 'ProviderController@getEditar');

// Agregar un nuevo proveedor
Route::post('proveedor', 'ProviderController@postRegistrar');

// Editar un proveedor existente
Route::put('proveedor/{id}', 'ProviderController@putEditar');

// Eliminar un proveedor existente
Route::delete('proveedor/{id}', 'ProviderController@delete');


/**
 * MATERIAL
 */

// Mostrar todos los proveedores
Route::get('materiales', 'MaterialController@getRegistrar');

// Mostrar la edición de un proveedor
Route::get('materiales/{id}', 'MaterialController@getEditar');

// Agregar un nuevo proveedor
Route::post('material', 'MaterialController@postRegistrar');

// Editar un proveedor existente
Route::put('material/{id}', 'MaterialController@putEditar');

// Eliminar un proveedor existente
Route::delete('material/{id}', 'MaterialController@delete');


/**
 * ALMACENES
 */

// Mostrar todos los almacenes
Route::get('almacenes', 'AlmacenController@getRegistrar');

// Mostrar la edición de un almacen
Route::get('almacenes/{id}', 'AlmacenController@getEditar');

// Agregar un nuevo almacen
Route::post('almacen', 'AlmacenController@postRegistrar');

// Editar un proveedor existente
Route::put('almacen/{id}', 'AlmacenController@putEditar');

// Eliminar un proveedor existente
Route::delete('almacen/{id}', 'AlmacenController@delete');