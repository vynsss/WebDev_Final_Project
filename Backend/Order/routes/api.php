<?php

use App\Http\Controllers\StatusController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/carts', 'CartController@show');
Route::get('/carts/all', 'CartController@show_all');    //to check only might
Route::get('/statuses', 'StatusController@show');
Route::get('/orders', 'OrderController@show');

//carts
Route::post('/carts/add', 'CartController@add');
Route::put('/carts/update', 'CartController@update_status');

//order
Route::post('/orders/add', 'OrderController@add');

Route::prefix('/admin')->group(function(){
    //status
    Route::post('/statuses/add', 'StatusController@add');
    Route::put('/statuses/update', 'StatusController@update');
});
