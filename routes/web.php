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

// Admin - Dashboard
Route::prefix('bo_dashboard')->group(function () {
    Route::post('updatecarousel', 'DashboardController@updateCarousel');
    Route::post('loadcarousel', 'DashboardController@loadCarousel');
    Route::post('loadselectedrooms', 'DashboardController@loadSelectedRooms');
    Route::post('loadscrolling', 'DashboardController@loadScrolling');
    Route::post('updatescrolling', 'DashboardController@updateScrolling');
});
// Admin - Users
Route::prefix('users')->group(function () {
    Route::post('loadall', 'UserController@loadAll');
    Route::delete('userdelete/{id}', [UserController::class, 'userDelete']);
    Route::post('findone', [UserController::class, 'findOne']);
    Route::post('searchuser/{search}', [UserController::class, 'searchUser']);
    Route::post('updatestatus', 'UserController@updateStatus');
    Route::post('setstats', 'UserController@setStats');
});

// Admin - Rooms
Route::prefix('bo_rooms')->group(function () {
    Route::post('newroom', 'RoomsController@newRoom');
    Route::post('loadall', 'RoomsController@loadAll');
    Route::post('updateroom', 'RoomsController@updateRoom');
    Route::delete('deleteroom/{id}', 'RoomsController@deleteRoom');
    Route::post('rateroom', 'RoomsController@rateRoom');
});

// Admin - Items
Route::prefix('bo_items')->group(function () {
    Route::post('loadall', 'ItemsController@loadAll');
    Route::post('newitem', 'ItemsController@newItem');
    Route::post('updateitem', 'ItemsController@updateItem');
    Route::delete('deleteitem/{id}', 'ItemsController@deleteItem');
});

// Shop
Route::prefix('bo_shop')->group(function () {
    Route::post('addgem', 'ShopController@addGem');
    Route::post('loadallgemitem', 'ShopController@loadAllGemItem');
    Route::post('loadallgolditem', 'ShopController@loadAllGoldItem');
    Route::post('buyitem', 'ShopController@buyItem');
});

// User_items
Route::prefix('useritems')->group(function () {
    Route::post('loaditem', 'UserItemController@loadItem');
    Route::post('getgold', 'UserItemController@getGold');
    Route::post('getgem', 'UserItemController@getGem');
    Route::post('addgold', 'UserItemController@addGold');
});

// Rooms
Route::prefix('rooms')->group(function () {
    //Route::post('letsplay', 'RomeOneController@index');
    //Route::post('room404', 'RomeOneController@index');
    //Route::view('/letsplay', 'scenarios/room_one_1');
});

// Forum
Route::prefix('forum')->group(function () {
    Route::post('addpost', 'ForumController@addPost');
    Route::post('loadpost', 'ForumController@loadPost');
    Route::post('loadonepost/{id}', 'ForumController@loadOnePost');
    Route::post('deletepost/{id}', 'ForumController@deletePost');
    Route::post('lockpost/{id}', 'ForumController@lockPost');
    Route::post('addcomment', 'ForumController@addComment');
    Route::post('loadcomments/{post_id}', 'ForumController@loadComments');
    Route::post('deletecomment/{id}', 'ForumController@deleteComment');
});
