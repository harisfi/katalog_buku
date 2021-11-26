<?php

use App\Http\Controllers\User\AboutUsController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\BookCategoryController;
use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\ContactUsController;
use App\Http\Controllers\User\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);
Route::get('/book-category/{id}', [BookCategoryController::class, 'show']);
Route::get('/contact-us', [ContactUsController::class, 'index']);
Route::get('/about-us', [AboutUsController::class, 'index']);
Route::resource('blog', BlogController::class)->only(['index', 'show']);

Route::prefix('admin')->group(function() {
    Route::redirect('/', '/admin/profil');
    Route::prefix('profil')->group(function() {
        Route::inertia('/', 'Admin.Profil.Index');
        Route::inertia('/edit', 'Admin.Profil.Edit');
    });
    Route::prefix('master')->group(function() {
        Route::prefix('kategori-buku')->group(function() {
            Route::inertia('/', 'Admin.KategoriBuku.Index');
            Route::inertia('/create', 'Admin.KategoriBuku.Create');
            Route::inertia('/{id}/edit', 'Admin.KategoriBuku.Edit');
        });
        Route::prefix('tag')->group(function() {
            Route::inertia('/', 'Admin.Tag.Index');
            Route::inertia('/create', 'Admin.Tag.Create');
            Route::inertia('/{id}/edit', 'Admin.Tag.Edit');
        });
        Route::prefix('penerbit')->group(function() {
            Route::inertia('/', 'Admin.Penerbit.Index');
            Route::inertia('/create', 'Admin.Penerbit.Create');
            Route::inertia('/{id}/edit', 'Admin.Penerbit.Edit');
        });
        Route::prefix('kategori-blog')->group(function() {
            Route::inertia('/', 'Admin.KategoriBlog.Index');
            Route::inertia('/create', 'Admin.KategoriBlog.Create');
            Route::inertia('/{id}/edit', 'Admin.KategoriBlog.Edit');
        });
    });
    Route::prefix('konten')->group(function() {
        Route::inertia('/', 'Admin.Konten.Index');
        Route::inertia('/create', 'Admin.Konten.Create');
        Route::inertia('/{id}', 'Admin.Konten.Show');
        Route::inertia('/{id}/edit', 'Admin.Konten.Edit');
    });
    Route::prefix('buku')->group(function() {
        Route::inertia('/', 'Admin.Buku.Index');
        Route::inertia('/create', 'Admin.Buku.Create');
        Route::inertia('/{id}', 'Admin.Buku.Show');
        Route::inertia('/{id}/edit', 'Admin.Buku.Edit');
    });
    Route::prefix('blog')->group(function() {
        Route::inertia('/', 'Admin.Blog.Index');
        Route::inertia('/create', 'Admin.Blog.Create');
        Route::inertia('/{id}', 'Admin.Blog.Show');
        Route::inertia('/{id}/edit', 'Admin.Blog.Edit');
    });
    Route::prefix('user')->group(function() {
        Route::inertia('/', 'Admin.User.Index');
        Route::inertia('/create', 'Admin.User.Create');
        Route::inertia('/{id}', 'Admin.User.Show');
        Route::inertia('/{id}/edit', 'Admin.User.Edit');
    });
});