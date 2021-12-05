<?php

use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\KategoriBlogController;
use App\Http\Controllers\Admin\KategoriBukuController;
use App\Http\Controllers\Admin\KontenController;
use App\Http\Controllers\Admin\PenerbitController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UbahPasswordController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
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

Route::middleware('user.data')->group(function() {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/book/{id}', [BookController::class, 'show']);
    Route::get('/book-category/{id}', [BookCategoryController::class, 'show']);
    Route::get('/contact-us', [ContactUsController::class, 'index']);
    Route::get('/about-us', [AboutUsController::class, 'index']);
    Route::resource('blog', BlogController::class)->only(['index', 'show']);
});

Route::prefix('login')->group(function() {
    Route::inertia('/', 'Login')->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function() {
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'auth.user:admin,superadmin'
    ], function() {
        Route::redirect('/', '/admin/profil');
        Route::prefix('profil')->group(function() {
            Route::get('/', [ProfilController::class, 'index']);
            Route::get('/edit', [ProfilController::class, 'edit']);
            Route::post('/', [ProfilController::class, 'update']);
        });
        Route::resources([
            'master/kategori-buku' => KategoriBukuController::class,
            'master/tag' => TagController::class,
            'master/penerbit' => PenerbitController::class,
            'master/kategori-blog' => KategoriBlogController::class
        ], [
            'except' => 'show'
        ]);
        Route::resources([
            'konten' => KontenController::class,
            'buku' => BukuController::class,
            'blog' => AdminBlogController::class
        ]);
        Route::get('/ubah-password', [UbahPasswordController::class, 'edit']);
        Route::post('/ubah-password', [UbahPasswordController::class, 'update']);
    });
    
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'auth.user:superadmin'
    ], function() {
        Route::resource('user', UserController::class);
    });
});