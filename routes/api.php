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

Route::group([
    'namespace' => 'Api\V1',
    'prefix' => 'v1',
    'as' => 'api.v1.',
    'middleware' => 'admin'
], function () {
    Route::resource('countries', 'CountriesController', ['except' => ['create', 'edit']]);
    Route::resource('users', 'UsersController', ['except' => ['create', 'edit']]);
});