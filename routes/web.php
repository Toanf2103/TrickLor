<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site;
use App\Http\Controllers\Admin;


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

// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [Admin\HomeController::class, 'login'])->name('admin.login');
    Route::post('/login', [Admin\HomeController::class, 'handleLogin'])->name('admin.login');
    Route::get('/logout', [Admin\HomeController::class, 'logout'])->name('admin.logout');


    Route::get('/', [Admin\HomeController::class, 'dashboard'])->name('admin.dashboard');

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [Admin\PostsController::class, 'index'])->name('admin.posts.index');
        Route::get('/create', [Admin\PostsController::class, 'create'])->name('admin.posts.create');
        Route::post('/', [Admin\PostsController::class, 'store'])->name('admin.posts.store');
        Route::get('/search', [Admin\PostsController::class, 'search'])->name('admin.posts.search');
        Route::post('/preview', [Admin\PostsController::class, 'preview'])->name('admin.posts.preview');
        Route::get('/{post}', [Admin\PostsController::class, 'show'])->name('admin.posts.show');
        Route::get('/{post}/edit', [Admin\PostsController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/{post}', [Admin\PostsController::class, 'update'])->name('admin.posts.update');
        Route::delete('/{post}', [Admin\PostsController::class, 'destroy'])->name('admin.posts.destroy');
        Route::get('/{post}/setStatus', [Admin\PostsController::class, 'setStatus'])->name('admin.posts.setStatus');
    });
});

// Site
Route::group(['prefix' => ''], function () {
    Route::get('/', [Site\HomeController::class, 'home'])->name('site.home');
    Route::get('/search', [Site\HomeController::class, 'search'])->name('site.search');
    Route::get('/post/{post}', [Site\HomeController::class, 'post'])->name('site.post');
    Route::get('/language/{language}', [Site\HomeController::class, 'language'])->name('site.language');
});
