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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/clear',function(){
    
    \Artisan::call('storage:link');
});

Route::group(['prefix' => '/'], function () {
    Voyager::routes();
    Route::get('/orders', ['uses' =>'App\Http\Controllers\VoyagerOrdersController@index', 'as' => 'voyager.orders.index']);
    Route::get('/orders/{id}', ['uses' =>'App\Http\Controllers\VoyagerOrdersController@show', 'as' => 'order.show']);
    Route::get('/ordersstatus/{id}/{status}', ['uses' =>'App\Http\Controllers\VoyagerOrdersController@status', 'as' => 'order.status']);

    
    Route::get('/inventory', ['uses' =>'App\Http\Controllers\VoyagerStockController@index', 'as' => 'voyager.stocks.index']);
    Route::get('/inventory/create', ['uses' =>'App\Http\Controllers\VoyagerStockController@create', 'as' => 'voyager.stocks.create']);
    Route::get('/getProducts', ['uses' =>'App\Http\Controllers\VoyagerOrdersController@getProducts', ]);
    Route::post('/inventory/store', ['uses' =>'App\Http\Controllers\VoyagerStockController@store', 'as' => 'voyager.stocks.store']);
    

});




