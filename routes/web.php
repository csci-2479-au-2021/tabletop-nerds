<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdministrationController;
use Illuminate\Support\Facades\Route;
use App\Services\GameService;

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

Route::get('/gameView/{id}', [GameController::class, 'gameView'])->name('gameView');

Route::get('/search-results', [SearchController::class, 'searchGamesByTitle'])->name('search-results');

Route::get('/games', [GameController::class, 'listGames'])->name('games');

Route::get('/SubmitAReview/{id}', [UserController::class,'UserGameRating'])->middleware(['auth'])->name('addGameRating');

Route::get('/YourReview', [UserController::class,'ViewGameReview'])->middleware(['auth'])->name('viewGameRating');

Route::post('/YourReview', [UserController::class, 'SubmitGameRating'])->middleware(['auth'])->name('userGameRating');
Route::post('/wishlist/add', [WishlistController::class, 'AddToWishlist'])->middleware(['auth'])->name('addToWishlist');
Route::post('/wishlist/remove', [WishlistController::class, 'RemoveFromWishlist'])->middleware(['auth'])->name('removeFromWishlist');

Route::get('/admin', [AdministrationController::class, 'adminView'])->middleware(['auth'])->name('AdminView');

require __DIR__.'/auth.php';
