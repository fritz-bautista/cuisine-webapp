<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;


Route::get('/ping', function () {
    return 'pong';
});


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/publish/arti-blogs', [ArticleController::class, 'arti_blogs'])->name('arti.blogs');
Route::get('/publish/arti-blogs/article-view', [ArticleController::class, 'arti_view'])->name('arti.view');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/community', [CommunityController::class, 'index'])->name('community.index');

//View Article
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// View restaurant
Route::get('/restaurant/featured-resto', [RestaurantController::class, 'index'])->name('featured.resto');
Route::get('/restaurant/restaurant-view', [RestaurantController::class, 'view_restaurant'])->name('restaurant.view');

// Create review  
Route::get('/restaurant/create-view', [RestaurantController::class, 'create_review'])->name('create.review');

// View Admin
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(middleware: ['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';

// Admin routes (no prefix, but all protected by auth and admin middleware)
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin/articles-manager', [ArticleController::class, 'articleDashboard'])->name('articles.dashboard');
    Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::get('/admin/restaurant-manager', [AdminController::class, 'admin_restaurant'])->name('admin.restaurants');
    Route::get('/admin/user-manager', [AdminController::class, 'admin_user'])->name('admin.users');
    Route::get('/admin/event-manager', [AdminController::class, 'admin_events'])->name('admin.events');

    // Edit article form
    Route::get('/admin/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

    // Update article
    Route::put('/admin/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');

    // Delete Article
    Route::delete('/admin/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});
