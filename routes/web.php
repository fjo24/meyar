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

//HOME
Route::get('/', 'PaginasController@home')->name('inicio');

//CATEGORIAS
Route::get('/categorias', 'PaginasController@categorias')->name('page.categorias');

//FILTRO PRODUCTOS - CATEGORIAS
Route::get('/productos/categoria/{id}',  'PaginasController@cat_productos')->name('page.cat.productos');

//FILTRO PRODUCTOS - SUBCATEGORIAS
Route::get('/productos/subcategoria/{id}',  'PaginasController@subcat_productos')->name('page.subcat.productos');

//INFO DEL PRODUCTO
Route::get('/productoinfo/{id}',  'PaginasController@productoinfo')->name('productoinfo');

//OFERTAS
Route::get('/ofertas',  'PaginasController@ofertas')->name('ofertas');

//EMPRESA
Route::get('/empresa',  'PaginasController@empresa')->name('empresa');

//SOLICITAR PRESUPUESTO
Route::get('/presupuesto',  'PaginasController@presupuesto')->name('presupuesto');
Route::post('enviar-presupuesto', [
    'uses' => 'PaginasController@enviarpresupuesto',
    'as'   => 'enviarpresupuesto',
]);

// ********************************************************** ZONA PRIVADA
Route::post('logindistribuidor', 'Auth\LoginDistribuidorController@login')->name('logindistribuidor');
//REGISTRO DE DISTRIBUIDORES
Route::get('registro', ['uses' => 'DistribuidorController@index', 'as' => 'registro']);
Route::post('/registro', ['uses' => 'DistribuidorController@store', 'as' => 'cliente.store']);
Route::post('/nuevousuario', ['uses' => 'DistribuidorController@registroStore', 'as' => 'registro.store']);

//TESTTS
Route::post('/store', 'ZprivadaController@store')->name('store');

//****************************************ZONA PRIVADA**************************************************************************************************************************************************
Route::get('/zonaprivada/productos', 'ZprivadaController@productos')->name('zproductos')->middleware('auth');
//BUSCADOR
Route::post('/buscador', ['uses' => 'BuscadorController@getProducts', 'as' => 'buscador']);

//novedades y ofertas
Route::get('/zonaprivada/ofertasynovedades', 'ZprivadaController@ofertasynovedades')->name('ofertasynovedades')->middleware('auth');

//HISTORICO
Route::get('/zonaprivada/historico', 'ZprivadaController@historico')->name('historico')->middleware('auth');

//VER DETALLE
Route::get('/zonaprivada/detalle/{id}', 'ZprivadaController@detalle')->name('detalle')->middleware('auth');

//LISTADO DE PRECIOS
Route::get('/zonaprivada/listadeprecios', 'ZprivadaController@listadeprecios')->name('listadeprecios')->middleware('auth');
// Rutas de reportes pdf desde la web
    Route::get('pdf2/{id}', ['uses' => 'ZprivadaController@downloadPdf2', 'as' => 'file-pdf2']);

//CARRITO
Route::group(['prefix' => 'carrito'], function () {
 //   Route::post('add', ['uses' => 'ZprivadaController@add', 'as' => 'carrito.add'])->middleware('auth');
    Route::get('add/{cantidad}/{producto}', 'ZprivadaController@add')->middleware('auth');
    Route::get('carrito', ['uses' => 'ZprivadaController@carrito', 'as' => 'carrito'])->middleware('auth');
    Route::get('delete/{id}', ['uses' => 'ZprivadaController@delete', 'as' => 'carrito.delete'])->middleware('auth');
    Route::post('enviar', ['uses' => 'ZprivadaController@send', 'as' => 'carrito.enviar'])->middleware('auth');
});

// DESCARGA DE FICHA
Route::get('fichaproducto/{id}', ['uses' => 'PaginasController@downloadficha', 'as' => 'ficha']);

//CONTACTO
Route::get('/contacto', 'PaginasController@contacto')->name('contacto');
Route::post('enviar-mailcontacto', [
    'uses' => 'PaginasController@enviarmailcontacto',
    'as'   => 'enviarmailcontacto',
]);

/*******************ADMIN************************/
Route::prefix('adm')->group(function () {
    
    /*------------DESCUENTOS----------------*/
    Route::resource('descuentos', 'Adm\DescuentosController')/* ->middleware('admin') */;

    Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard');

    /*------------USERS----------------*/
    Route::resource('users', 'Adm\UsersController')/* ->middleware('admin') */;

    /*------------DATOS----------------*/
    Route::get('/datos-page', 'Adm\DatosController@page')->name('datos.page');
    Route::resource('datos', 'Adm\DatosController');
    
    /*------------USUARIOS----------------*/
    Route::get('/usuarios-page', 'Adm\UsuariosController@page')->name('usuarios.page');
    Route::resource('usuarios', 'Adm\UsuariosController');
    
    /*------------SLIDERS----------------*/
    Route::resource('sliders', 'Adm\SlidersController');
    
    /*------------BANNER----------------*/
    Route::resource('banner', 'Adm\BannerController');

     /*------------SERVICIOS----------------*/
     Route::resource('servicios', 'adm\ServiciosController');
    
    /*------------CATEGORIAS----------------*/
    Route::resource('categorias', 'Adm\CategoriasController');
    
    /*------------CONTENIDO EMPRESAS----------------*/
    Route::resource('contenido_empresas', 'Adm\ContenidoEmpresasController');
    
    /*------------VALOR AGREGADO----------------*/
    Route::resource('valor_agregados', 'Adm\AgregadosController');
    
    /*------------REDES----------------*/
    Route::resource('redes', 'Adm\RedesController');
    
    /*------------PRODUCTOS----------------*/
    Route::resource('productos', 'Adm\ProductosController');
    
    /*------------IMAGENES----------------*/
    Route::get('producto/{producto_id}/imagenes/', 'Adm\ProductosController@imagenes')->name('imgproducto.lista'); //index del modulo imagenes
    //agregar nuevas imagenes de productos
    Route::post('producto/nuevaimagen/{id}', 'Adm\ProductosController@nuevaimagen')->name('imgproducto.nueva'); //es el store de las imagenes
    Route::delete('imgproducto/{id}/destroy', [
        'uses' => 'Adm\ProductosController@destroyimg',
        'as'   => 'imgproducto.destroy',
    ]);

    /*------------CATALOGOS----------------*/
    Route::resource('catalogos', 'Adm\CatalogosController');
    // Rutas de reportes pdf
    Route::get('pdf/{id}', ['uses' => 'Adm\CatalogosController@downloadPdf', 'as' => 'file-pdf']);

    //DASHBOARD
    Route::get('/dashboard', 'Adm\AdminController@admin');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');