<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('auth/new/user', [UserController::class, 'store'])->name('auth.new.user');
Route::get('auth/posts', [PostController::class, 'index'])->name('auth.post.index');
Route::get('auth/posts/{id}', [PostController::class, 'show'])->name('auth.post.show');

Route::group([ 'middleware' => 'auth-jwt', 'prefix' => 'auth' ], function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
    Route::post('me', [AuthController::class, 'me'])->name('auth.me');

    Route::post('posts', [PostController::class, 'store'])->name('auth.posts.store');
    Route::put('posts', [PostController::class, 'update'])->name('auth.posts.update');
    Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('auth.posts.destroy');

});
