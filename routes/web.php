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
Route::get('/depotAdd', 'InventoryController@depotAdd');
Route::get('/depotProduct/{id}', 'InventoryController@depotProduct');


Route::get('/product', 'InventoryController@product');
Route::get('/product/{id}', 'InventoryController@product');
Route::get('/productAdd', 'InventoryController@productAdd');
Route::get('/productEdit/{id}', 'InventoryController@productEdit');
Route::put('/productEdit/{id}', 'InventoryController@productSetEdit');
Route::post('/productAdd', 'InventoryController@productNew');
Route::get('/tools/{id}', 'InventoryController@tools');

Route::get('/entry', 'InventoryController@entry');
Route::get('/entryAdd', 'InventoryController@entryAdd');
Route::post('/entryAdd', 'InventoryController@entryNew');

Route::get('/egress', 'InventoryController@egress');
Route::get('/egressAdd', 'InventoryController@egressAdd');
Route::post('/egressAdd', 'InventoryController@egressNew');
//personals

Route::get('/registrer', 'Auth\RegisterController@showRegistrationForm');
Route::get('/list', 'InventoryController@personals');
Route::get('/provider', 'InventoryController@providers');
Route::get('/providerEdit/{id}', 'InventoryController@personalEdit');
Route::put('/providerEdit/{id}', 'InventoryController@personalSetEdit');
Route::get('/personal', 'InventoryController@personal');
Route::post('/personal', 'InventoryController@personalNew')->name('personal');
Route::get('/users', 'InventoryController@users');
