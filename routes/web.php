<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{route}', function () {
    return view('index');
})->where('route', '.*');

// Pour authentification
Route::prefix('auth')->group(function () {
    Route::post('init', 'AppController@init');
    /* Route::get -> Bug */

    Route::post('login', 'AppController@login');
    Route::post('register', 'AppController@register');
    Route::post('logout', 'AppController@logout');
});

// Users
Route::prefix('users')->group(function () {
    Route::post('loadall', 'UserController@loadAll');
    Route::delete('userdelete/{id}', [UserController::class, 'userDelete']);
    Route::post('findone', [UserController::class, 'findOne']);
    Route::post('searchuser/{search}', [UserController::class, 'searchUser']);
    Route::post('updatestatus', 'UserController@updateStatus');
});

// Rooms
Route::prefix('bo_rooms')->group(function () {
    Route::post('newroom', 'RoomsController@newRoom');
});
