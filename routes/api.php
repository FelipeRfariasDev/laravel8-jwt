<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostsController;

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('auth/new/user', [EmployeeController::class, 'store'])->name('new.user');
Route::get('auth/posts', [PostsController::class, 'index']);
Route::get('auth/posts/{id}', [PostsController::class, 'show']);

Route::group([ 'middleware' => 'auth-jwt', 'prefix' => 'auth' ], function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('me', [AuthController::class, 'me'])->name('me');

    Route::post('posts', [PostsController::class, 'store']);
    Route::delete('posts/{id}', [PostsController::class, 'destroy']);
    Route::put('posts', [PostsController::class, 'update']);
});
