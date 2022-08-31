<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;



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

// Route::get('/', HomeController::class);

Route::controller(PageController::class)->group(function () {
  Route::get('/about', 'about');
});

Route::prefix('dashboard/products')->middleware('auth')->group(function () {
  Route::get('/', [ProductController::class, 'index'])->name('dashboard');
  Route::get('/create', [ProductController::class, 'create']);
  Route::post('/create', [ProductController::class, 'store']);
  Route::get('/update/{slug}', [ProductController::class, 'updateForm']);
  Route::put('/update/{slug}', [ProductController::class, 'update']);
  Route::get('/delete/{slug}', [ProductController::class, 'destroy']);
});

Route::prefix('dashboard/store')->middleware('auth')->group(function () {
  Route::get('/', [PageController::class, 'store']);
  Route::post('/', [PageController::class, 'create']);
});

// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/blogs', [BlogController::class, 'index']);

Route::middleware('adminkey')->group(function () {
  Route::get('users', [UserController::class, 'index']);
});

Route::get('users/{user}', [UserController::class, 'show']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
