<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function (){
    Route::prefix('dashboard')->group(function (){
        Route::get('home', 'HomeController@dashboard')->name('dashboard')
            ->middleware('permission:access_dashboard');
        // TODO: Rutas módulo Tienda
        // Index: Muestra el listado de tiendas
        Route::get('tiendas', 'ShopController@index')->name('shop.index')
            ->middleware('permission:create_store');
        // Create: Muestra el formulario de creación
        Route::get('tienda/crear', 'ShopController@create')->name('shop.create')
            ->middleware('permission:create_store');
        // Store: Guarda en la BD la tienda
        Route::post('shop/store', 'ShopController@store')->name('shop.store')
            ->middleware('permission:save_store');



        // Edit: Mostrar el formulario de actualización
        Route::get('tienda/actualizar/{id}', 'ShopController@edit')->name('shop.edit')
            ->middleware('permission:edit_store');
        // Update: Guarda la nueva información de la tienda
        Route::post('shop/update', 'ShopController@update')->name('shop.update')
            ->middleware('permission:update_store');
        // Destroy: Eliminar la tienda
        Route::post('shop/destroy', 'ShopController@destroy')->name('shop.destroy')
            ->middleware('permission:destroy_store');



        // Trashed: Devuelve las tiendas eliminadas
        Route::get('tiendas/eliminadas', 'ShopController@trashed')->name('shop.trashed')
            ->middleware('permission:restore_store');
        // Restore: Restaurar una tienda
        Route::post('shop/restore', 'ShopController@restore')->name('shop.restore')
            ->middleware('permission:restore_store');



    });
});


