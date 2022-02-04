<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('auth/new/user', [UserController::class, 'store'])->name('auth.new.user');
//Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
/*

Route::get('auth/posts/{id}', [PostController::class, 'show'])->name('auth.post.show');

Route::put('auth/posts', [PostController::class, 'update'])->name('auth.posts.update');
Route::delete('auth/posts/{id}', [PostController::class, 'destroy'])->name('auth.posts.destroy');
 */

/*
Route::get('auth/posts', [PostController::class, 'index'])->name('auth.post.index');
Route::post('auth/posts', [PostController::class, 'store'])->name('auth.posts.store');

Route::get('auth/comentarios', [ComentarioController::class, 'index'])->name('auth.comentarios.index');
Route::post('auth/comentarios', [ComentarioController::class, 'store'])->name('auth.comentarios.store');
*/

Route::group([ 'middleware' => 'auth-jwt', 'prefix' => 'auth' ], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
    Route::post('me', [AuthController::class, 'me'])->name('auth.me');


    Route::get('posts', [PostController::class, 'index'])->name('auth.post.index');
    Route::get('posts/{id}', [PostController::class, 'show'])->name('auth.post.show');

    Route::post('posts', [PostController::class, 'store'])->name('auth.posts.store');
    Route::put('posts', [PostController::class, 'update'])->name('auth.posts.update');
    Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('auth.posts.destroy');

});
