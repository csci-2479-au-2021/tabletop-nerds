<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Repositories\GameRepository;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/profile', [UserController::class, 'userInfo'])->middleware(['auth'])->name('profile');

Route::get('/wishlist', [WishlistController::class, 'viewWishlist'])->middleware(['auth'])->name('wishlist');

Route::get('/gameView', [GameController::class, 'gameView'])->name('gameView');

Route::get('/search-results', [GameRepository::class, 'searchGamesByTitle']);

Route::get('/games', [GameController::class, 'index'])->name('games');

require __DIR__.'/auth.php';
