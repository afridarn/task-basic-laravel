<?php

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use  App\Http\Controllers\API\StoreController;
use App\Http\Controllers\API\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('user', 'user');
        Route::post('logout', 'logout');
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(StoreController::class)->prefix('store')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'create');
        Route::post('/update', 'update');
    });

    Route::controller(ProductController::class)->prefix('product')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'create');
        Route::post('/update', 'update');
        Route::delete('/', 'delete');
    });
});
