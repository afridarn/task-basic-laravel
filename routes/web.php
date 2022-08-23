<?php

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
//     return view('welcome');
// });

Route::get('/', fn () => view('home'));

Route::get('/about', fn () => view('about'));

Route::get('/blogs', fn () => view('blogs'));

Route::get('login', fn () => view('login'));

Route::get('register', fn () => view('register'));
