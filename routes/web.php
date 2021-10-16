<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::get('/wishlist', [WishlistController::class, 'viewWishlist'])->middleware(['auth'])->name('wishlist');

Route::get('/games', [GameController::class, 'listGames'])->name('games');

Route::get('/search-results',[SearchController::class, 'search']);


Route::get('/game/{id}', function ($id) {
    return view('game');
})->name('game');

require __DIR__.'/auth.php';
