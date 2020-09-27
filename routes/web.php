<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rooms', 'ShopController@index')->name('rooms');
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/account', 'AccountController@index')->name('account');
Route::get('/avatar', 'AvatarController@index')->name('avatar');
Route::get('/inventory', 'InventoryController@index')->name('inventory');
Route::get('/myrooms', 'MyroomsController@index')->name('myrooms');

//Scénario 1
Route::get('/room_one', 'RomeOneController@index')->name('room_one');
