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
    return redirect()->route('login');
});

Route::get('/logaout', function () {
    session()->regenerate();
    return redirect()->route('login');
});



Auth::routes();


Route::group(['middleware' => 'admin'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*administradores tienda*/
Route::get('/administradorestienda', [App\Http\Controllers\AdmninistradorestiendaController::class, 'index'])->name('administradorestienda');
Route::get('/createAdministradorestienda', [App\Http\Controllers\AdmninistradorestiendaController::class, 'create'])->name('createAdministradorestienda');
Route::post('/Administradorestiendastore', [App\Http\Controllers\AdmninistradorestiendaController::class, 'store'])->name('Administradorestiendastore');
Route::get('/editAdministradorestienda/{id}', [App\Http\Controllers\AdmninistradorestiendaController::class,'edit'])->name('editAdministradorestienda');
Route::post('/updateAdministradorestienda', [App\Http\Controllers\AdmninistradorestiendaController::class,'update'])->name('updateAdministradorestienda');
Route::post('/Administradorestiendadelete/{id}', [App\Http\Controllers\AdmninistradorestiendaController::class,'destroy'])->name('Administradorestiendadelete');


/* ------------*/
/* categorias tiendas*/

Route::get('/categoriatienda', [App\Http\Controllers\CategoriatiendaController::class, 'index'])->name('categoriatiendas');
Route::get('/createCategoriatienda', [App\Http\Controllers\CategoriatiendaController::class, 'create'])->name('createCategoriatienda');
Route::post('/Categoriatiendastore', [App\Http\Controllers\CategoriatiendaController::class, 'store'])->name('Categoriatiendastore');
Route::get('/editCategoriatienda/{id}', [App\Http\Controllers\CategoriatiendaController::class,'edit'])->name('editCategoriatienda');
Route::post('/updateCategoriatienda', [App\Http\Controllers\CategoriatiendaController::class,'update'])->name('updateCategoriatienda');
Route::post('/Categoriatiendadelete/{id}', [App\Http\Controllers\CategoriatiendaController::class,'destroy'])->name('Categoriatiendadelete');
/*--   --*/


/* tiendas*/
Route::get('/tiendas', [App\Http\Controllers\TiendaController::class, 'index'])->name('tiendas');
Route::get('/createtienda', [App\Http\Controllers\TiendaController::class, 'create'])->name('createtienda');
Route::post('/Tiendastore', [App\Http\Controllers\TiendaController::class, 'store'])->name('Tiendastore');
Route::get('/editTiendas/{id}', [App\Http\Controllers\TiendaController::class,'edit'])->name('editTiendas');
Route::post('/updateTiendas', [App\Http\Controllers\TiendaController::class,'update'])->name('updateTiendas');
Route::post('/Tiendasdelete/{id}', [App\Http\Controllers\TiendaController::class,'destroy'])->name('Tiendasdelete');
/*----*/       

/* categorias productos */
Route::get('/categoriaproductos', [App\Http\Controllers\CategoriaproductoController::class, 'index'])->name('categoriaproductos');
Route::get('/categoriaproductocrear', [App\Http\Controllers\CategoriaproductoController::class, 'create'])->name('categoriaproductocrear');
Route::post('/categoriastore', [App\Http\Controllers\CategoriaproductoController::class, 'store'])->name('categoriastore');
Route::get('/editcategorias/{id}', [App\Http\Controllers\CategoriaproductoController::class,'edit'])->name('editcategorias');
Route::post('/updatecategorias', [App\Http\Controllers\CategoriaproductoController::class,'update'])->name('updatecategorias');
Route::post('/categoriasdelete/{id}', [App\Http\Controllers\CategoriaproductoController::class,'destroy'])->name('destroycategorias');
/* --- */
/* productos */
Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos');
Route::get('/crearproductos', [App\Http\Controllers\ProductoController::class,'create'])->name('crearproductos');
Route::post('/updateproductos', [App\Http\Controllers\ProductoController::class,'update'])->name('updateproductos');
Route::get('/productosedit/{id}', [App\Http\Controllers\ProductoController::class,'edit'])->name('editproductos');
Route::post('/productosdelete/{id}', [App\Http\Controllers\ProductoController::class,'destroy'])->name('destroyproductos');
Route::post('/saveproductos',  [App\Http\Controllers\ProductoController::class,'store'] );
/*-- --*/
});