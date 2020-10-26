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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::middleware('auth')->group(function () {

    Route::group(['prefix' => 'products'], function () {

        Route::get('/', 'Api\ProductController@listAllProducts');
        Route::get('/{$product_id}', 'Api\ProductController@listSingleProduct');

        Route::post('/create', 'Api\ProductController@store');
        Route::post('/add_user/{$product_id}', 'Api\ProductController@addUserToProduct');
        Route::post('/remove_user/{$product_id}', 'Api\ProductController@removeUserFromProduct');

        Route::delete('/delete/{$product_id}', 'Api\ProductController@delete');

    });

//});