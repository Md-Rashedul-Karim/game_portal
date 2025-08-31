<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GamepostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/categories', [FrontendController::class, 'categories'])->name('categories.category');
Route::get('/category/index/{id?}', [FrontendController::class, 'category'])->name('category.index');
Route::get('/game-details/{id?}', [FrontendController::class, 'showgame'])->name('game-details');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->get('/dashboard', [GamepostController::class, 'dashboard'])->name('dashboard');

// Category
Route::group(['middleware' => ['auth'], 'prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::get('/category_list/{id?}', [CategoryController::class, 'index'])->name('index');
    Route::post('category_list', [CategoryController::class, 'categoryStore'])->name('store');
    Route::post('categories/update/{id?}', [CategoryController::class, 'categoryUpdate'])->name('update');
    Route::delete('category/{category}', [CategoryController::class, 'categoryDestroy'])->name('destroy');
});

// Gamepost
Route::group(['middleware' => ['auth'], 'prefix' => 'games', 'as' => 'games.'], function () {
    Route::get('/list/{id?}', [GamepostController::class, 'index'])->name('index');
    Route::get('/create', [GamepostController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [GamepostController::class, 'edit'])->name('edit');
    Route::post('/store', [GamepostController::class, 'store'])->name('store');
    Route::PUT('games/update/{id?}', [GamepostController::class, 'update'])->name('update');
    Route::delete('games/{gamepost}', [GamepostController::class, 'destroy'])->name('destroy');
});
