<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::post('/auth/register',  'AuthController@register');
// Route::post('/auth/login',  'AuthController@login');
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::get('/logout', 'logout');
});


Route::middleware("auth:sanctum")->group(function () {
    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        Route::get('/profile', 'profile');
        Route::get('/logout', 'logout');
    });

    Route::prefix('product')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', "store");
        Route::get('/{id}', "get");
        Route::post('/{id}', "edit");
        Route::delete('/{id}/delete', 'destroy');
    });
});
