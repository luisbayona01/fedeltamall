<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('auth/register',[App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('auth/login',[App\Http\Controllers\Api\AuthController::class,'login']);
Route::post('auth/me',[App\Http\Controllers\Api\AuthController::class,'me'])->middleware('auth:api');;
Route::get('tiendascategoria', [App\Http\Controllers\CategoriatiendaController::class,'showallcategorias']);
Route::get('tiendas', [App\Http\Controllers\TiendaController::class, 'Showall']);
Route::post('productostienda', [App\Http\Controllers\ProductoController::class ,'allproductTienda']);
Route::post('categoriasproductosTienda',[App\Http\Controllers\CategoriaproductoController::class,'allcategoriaTienda']);
Route::post('addordencompra',[App\Http\Controllers\OrdendecompraController::class, 'addordencompra']);
Route::post('showcarrito',[App\Http\Controllers\OrdendecompraController::class, 'showord']);
Route::post('edidcantidad',[App\Http\Controllers\OrdendecompraController::class, 'edidcantidad']);
Route::post('deleteproducord',[App\Http\Controllers\OrdendecompraController::class, 'deleteorden']);
Route::post('auth/recovery',[App\Http\Controllers\Api\AuthController::class,'recoverypass']);
Route::post('auth/resetpassword',[App\Http\Controllers\Api\AuthController::class,'cambiopass']);

