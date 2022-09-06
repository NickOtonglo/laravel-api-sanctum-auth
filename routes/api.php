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

// Public routes
// Route::resource('products', ProductsController::class);
Route::get('/products', 'ProductsController@index');
Route::get('/products/{id}', 'ProductsController@show');
Route::get('/products/search/{name}', 'ProductsController@search');
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', 'ProductsController@store');
    Route::put('/products/{id}', 'ProductsController@update');
    Route::delete('/products/{id}', 'ProductsController@destroy');
    Route::post('/logout', 'AuthController@logout');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
