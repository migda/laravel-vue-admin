<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'admin'
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Views => redirect to page with router-view
    // Countries
    Route::get('/countries', 'HomeController@index');
    Route::get('/countries/{id}', 'HomeController@index');
    // Users
    Route::get('/users', 'HomeController@index');
    Route::get('/users/{id}', 'HomeController@index');
});