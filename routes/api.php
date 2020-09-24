<?php

use Illuminate\Http\Request;

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
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['jwt.verify']], function ()
{
Route::post('/customers','customersController@store');
Route:: get('/customers/{id}', 'customersController@detail');
Route:: get('/customers', 'customersController@show');
Route::delete('/customers/{id}', 'customersController@destroy');

Route::post('/order','orderController@store');
Route::get('/order', 'orderController@show');
Route::put('/order/{id}', 'orderController@update');
Route::get('/order/{id}', 'orderController@detail');
Route::delete('/order/{id}', 'orderController@destroy');

Route:: get('/product', 'productController@show');
Route:: post('/product', 'productController@store');
Route:: get('/product/{id}', 'productController@detail');
Route::delete('/product/{id}', 'productController@destroy');

Route::post('/stok','stokController@store');

Route::post('/petugas','petugasController@store');
});