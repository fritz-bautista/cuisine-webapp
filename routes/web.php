<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RestaurantController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/publish/arti-blogs', [ArticleController::class, 'arti_blogs'])->name('arti.blogs');
Route::get('/restaurant/featured-resto', [RestaurantController::class, 'index'])->name('featured.resto');