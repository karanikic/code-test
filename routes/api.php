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
Route::middleware('auth')->group(function () {
    Route::get('products', 'Api\ProductController@listAllProducts');
    Route::get('products/{$product_id}', 'Api\ProductController@listSingleProduct');
    Route::post('products/create', 'Api\ProductController@store');
    Route::delete('products/delete/{$product_id}','Api\ProductController@delete');
    Route::post('products/{$product_id}/add_user', 'Api\ProductController@addUserToProduct');
    Route::post('products/{$product_id}/remove_user', 'Api\ProductController@removeUserFromProduct');
});