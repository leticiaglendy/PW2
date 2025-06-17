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

Route::get('/categoria','App\Http\Controllers\CategoriaController@index');
Route::post('/categoria','App\Http\Controllers\CategoriaController@store');

Route::get('/produto','App\Http\Controllers\ProdutoController@index');
Route::post('/produto','App\Http\Controllers\ProdutoController@store');

Route::get('/contato','App\Http\Controllers\ContatoController@index');
Route::post('/contato','App\Http\Controllers\ContatoController@store');

//login e usuario
Route::get('/usuario','App\Http\Controllers\UserController@index');
Route::post('/usuario','App\Http\Controllers\UserController@store');
Route::post('/usuario','App\Http\Controllers\UserController@logoutUser');

Route::get('/login','App\Http\Controllers\UserController@verifyUser');

//grafico
Route::get('/dashboard','App\Http\Controllers\ProdutoController@dashboard');

