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
Route::get('/suppliers', 'api\SupplierController@showSuppliers');

Route::get('/suppliers/{id}', 'api\SupplierController@showOneSupplier');
    
Route::post('/suppliers', 'api\SupplierController@createSupplier');
    
Route::put('/suppliers/{id}', 'api\SupplierController@updateSupplier');
    
Route::delete('/suppliers/{id}', 'api\SupplierController@deleteSupplier');
