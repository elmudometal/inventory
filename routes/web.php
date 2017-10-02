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

Route::get('/casa', function () {
    return view('welcome');
});
Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/depot', 'InventoryController@depot');
Route::get('/depotAdd', 'InventoryController@depotAdd');
Route::post('/depotAdd', 'InventoryController@depotNew');

Route::get('/product', 'InventoryController@product');
Route::get('/productAdd', 'InventoryController@productAdd');
Route::post('/productAdd', 'InventoryController@productNew');

Route::get('/entry', 'InventoryController@entry');
Route::get('/entryAdd', 'InventoryController@entryAdd');
Route::post('/entryAdd', 'InventoryController@entryNew');


//personals

Route::get('/registrer', 'Auth\RegisterController@showRegistrationForm');