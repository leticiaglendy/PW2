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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//modificado
Route::get('/contato','App\Http\Controllers\ContatoController@indexApi');
Route::post('/contato','App\Http\Controllers\ContatoController@storeApi');
Route::delete('/contato/{id}','App\Http\Controllers\ContatoController@destroyApi');
Route::put('/contato/{id}','App\Http\Controllers\ContatoController@updateapi');

Route::get('/categoria','App\Http\Controllers\CategoriaController@indexApi');
Route::post('/categoria','App\Http\Controllers\CategoriaController@storeApi');
Route::delete('/categoria/{id}','App\Http\Controllers\CategoriaController@destroyApi');
Route::put('/categoria/{id}','App\Http\Controllers\CategoriaController@updateapi');


Route::get('/produto','App\Http\Controllers\ProdutoController@indexApi');
Route::post('/produto','App\Http\Controllers\ProdutoController@storeApi');
Route::delete('/produto/{id}','App\Http\Controllers\ProdutoController@destroyApi');
Route::put('/produto/{id}','App\Http\Controllers\ProdutoController@updateapi');

//Selects
Route::get('/soma-produto','App\Http\Controllers\ProdutoController@somaProdutos');
Route::get('/maior-produto','App\Http\Controllers\ProdutoController@maiorQuantidade');
Route::get('/menor-produto','App\Http\Controllers\ProdutoController@menorQuantidade');
Route::get('/media-produto','App\Http\Controllers\ProdutoController@mediaPreco');

Route::get('/total-categoria','App\Http\Controllers\CategoriaController@totalCategorias');

Route::get('/total-contato','App\Http\Controllers\ContatoController@totalContatos');
Route::get('/listar-contato','App\Http\Controllers\ContatoController@listarContatoSql');

//user
Route::get('/cliente','App\Http\Controllers\ClienteController@indexapi');
Route::post('/cliente','App\Http\Controllers\ClienteController@storeapi');
Route::delete('/cliente/{id}','App\Http\Controllers\ClienteController@destroyapi');
Route::put('/cliente/{id}','App\Http\Controllers\ClienteController@updateapi');
