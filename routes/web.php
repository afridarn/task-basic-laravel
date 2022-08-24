<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;


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

Route::get('/', HomeController::class);

Route::controller(PageController::class)->group(function () {
  Route::get('/about', 'about');
  Route::get('/login', 'login');
  Route::get('/register', 'register');
});


Route::get('/blogs', [BlogController::class, 'index']);

Route::middleware('adminkey')->group(function () {
  Route::get('users', [UserController::class, 'index']);
});

Route::get('users/{user}', [UserController::class, 'show']);
