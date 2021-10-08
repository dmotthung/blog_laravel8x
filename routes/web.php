<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CategoryController;
use UniSharp\LaravelFilemanager\Lfm;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;


// Auth
Auth::routes([
    'register' => false
]);
//Language
Route::get('/language/{language}', [LanguageController::class, 'switch_lg'])->name('language.switch_lg');

Route::middleware(['web', 'auth'])->group(function () {
    // Dashboard
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

        // Categories
        Route::get('categories/select', [CategoryController::class, 'select'])->name('categories.select');
        Route::resource('/categories', CategoryController::class);

        // Tags
        Route::get('/tags/select', [TagController::class, 'select'])->name('tags.select');
        Route::resource('/tags', TagController::class)->except('show');

        // Posts
        Route::resource('/posts', PostController::class);

        // Roles
        Route::get('/roles/select', [RoleController::class, 'select'])->name('roles.select');
        Route::resource('roles', RoleController::class);

        // Users
        Route::resource('/users', UserController::class)->except('show');

        // File Manager
        Route::group(['prefix' => 'filemanager'], function () {
            Route::get('/index', [FileManagerController::class, 'index'])->name('filemanager.index');
            Lfm::routes();
        });
    });
});


Route::get('/', [BlogController::class, 'home'])->name('blog.home');

Route::get('/chuyen-muc', [BlogController::class, 'showCategories'])->name('blog.categories');

Route::get('/tag', [BlogController::class, 'showTags'])->name('blog.tags');
Route::get('/tag/{slug}', [BlogController::class, 'showPostsByTag'])->name('blog.posts.tag');

Route::get('/tim-kiem', [BlogController::class, 'search_post'])->name('blog.search_post');

Route::get('/{slug}', [BlogController::class, 'showPostDetail'])->name('blog.posts.detail');
