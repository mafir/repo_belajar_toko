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
    Route::group(['middleware' => ['api.superadmin']], function() {
        Route::delete('/customers/{id}', 'customersController@destroy');
        Route::delete('/order/{id}', 'orderController@destroy');
        Route::delete('/product/{id}', 'productController@destroy');
    });
    Route::group(['middleware' => ['api.admin']], function() {
        Route::post('/customers','customersController@store');
        Route::put('/customers/{id}', 'customersController@update');

        Route::post('/order','orderController@store');
        Route::put('/order/{id}', 'orderController@update');

        Route:: post('/product', 'productController@store');
        Route::put('/product/{id}', 'productController@update');
    });
    
    Route:: get('/customers/{id}', 'customersController@detail');
    Route:: get('/customers', 'customersController@show');
    
    Route::get('/order', 'orderController@show');
    Route::get('/order/{id}', 'orderController@detail');
    
    Route:: get('/product', 'productController@show');  
    Route:: get('/product/{id}', 'productController@detail');
    
    Route::post('/stok','stokController@store');

    Route::post('/petugas','petugasController@store');
});