<?php

use App\Http\Controllers\User\AboutUsController;
use App\Http\Controllers\User\BlogController;
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

// Route::get('/', function () {
//     return view('app');
// });

// Route::inertia('/', 'user.index');
Route::get('/', [HomeController::class, 'index']);
Route::get('/contact-us', [ContactUsController::class, 'index']);
Route::get('/about-us', [AboutUsController::class, 'index']);
Route::resource('blog', BlogController::class)->only(['index', 'show']);