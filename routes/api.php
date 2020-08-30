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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/customers','customersController@store');
Route:: post('/customers/{id}', 'orderController@detail');
Route:: post('/customers', 'orderController@store');
Route:: get('/customers', 'customersController@show');

Route::post('/order','orderController@store');
Route:: get('/order', 'orderController@show');

Route:: get('/product', 'productController@show');
Route:: post('/product', 'productController@store');

Route::post('/stok','stokController@store');

Route::post('/petugas','petugasController@store');