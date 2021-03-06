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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//get method
Route::get('/products', 'ProductController@show_available');    //customer
Route::get('/categories', 'CategoryController@show');           //customer
Route::get('/statuses', 'StatusController@show');
// Route::get('/test', 'ProductController@test');

//product controller
Route::get('/products/category', 'ProductController@show_category');//customer
Route::get('/products/pagination', 'ProductController@pagination');
Route::get('/product', 'ProductController@show_individual');

Route::prefix('/admin')->group(function(){
    Route::get('/products', 'ProductController@show_all');
    Route::post('/products/create', 'ProductController@insert');
    Route::put('/products/update', 'ProductController@update');

    //category controller
    Route::post('/categories/create', 'CategoryController@insert');
    Route::delete('/categories/delete', 'CategoryController@delete');   //might delete
    Route::put('/categories/update', 'CategoryController@update');

    //status controller
    Route::post('/statuses/create', 'StatusController@insert');
    Route::put('/statuses/update', 'StatusController@update');
});
