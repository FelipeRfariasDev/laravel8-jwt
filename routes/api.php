<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('auth/new/user', [UsersController::class, 'store'])->name('auth.new.user');
Route::get('auth/posts', [PostsController::class, 'index'])->name('auth.post.index');
Route::get('auth/posts/{id}', [PostsController::class, 'show'])->name('auth.post.show');

Route::group([ 'middleware' => 'auth-jwt', 'prefix' => 'auth' ], function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
    Route::post('me', [AuthController::class, 'me'])->name('auth.me');

    Route::post('posts', [PostsController::class, 'store'])->name('auth.posts.store');
    Route::put('posts', [PostsController::class, 'update'])->name('auth.posts.update');
    Route::delete('posts/{id}', [PostsController::class, 'destroy'])->name('auth.posts.destroy');

});
