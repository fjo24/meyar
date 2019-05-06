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

Route::get('/', function () {
    return view('welcome');
});

/*******************ADMIN************************/
Route::prefix('adm')->group(function () {


    Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard');

    /*------------DATOS----------------*/
    Route::get('/datos-page', 'Adm\DatosController@page')->name('datos.page');
    Route::resource('datos', 'Adm\DatosController');
    
    /*------------USUARIOS----------------*/
    Route::get('/usuarios-page', 'Adm\UsuariosController@page')->name('usuarios.page');
    Route::resource('usuarios', 'Adm\UsuariosController');
    
    /*------------SLIDERS----------------*/
    Route::get('/sliders-page', 'Adm\SlidersController@page')->name('sliders.page');
    Route::resource('sliders', 'Adm\SlidersController');



    //DASHBOARD
    Route::get('/dashboard', 'Adm\AdminController@admin');
    

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
