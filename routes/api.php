<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('auth/new/user', [UserController::class, 'store'])->name('auth.new.user');


Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('auth/refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
Route::post('auth/me', [AuthController::class, 'me'])->name('auth.me');

Route::get('auth/posts', [PostController::class, 'index'])->name('auth.post.index');
Route::get('auth/posts/{id}', [PostController::class, 'show'])->name('auth.post.show');

Route::post('auth/posts', [PostController::class, 'store'])->name('auth.posts.store');
Route::put('auth/posts', [PostController::class, 'update'])->name('auth.posts.update');
Route::delete('auth/posts/{id}', [PostController::class, 'destroy'])->name('auth.posts.destroy');


Route::get('auth/comentarios/{post_id}', [ComentarioController::class, 'show'])->name('auth.comentarios.show');
Route::post('auth/comentarios', [ComentarioController::class, 'store'])->name('auth.comentarios.store');
Route::delete('auth/comentarios/{id}', [ComentarioController::class, 'destroy'])->name('auth.comentarios.destroy');

Route::group([ 'middleware' => 'auth-jwt', 'prefix' => 'auth' ], function () {

    /*
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
    Route::post('me', [AuthController::class, 'me'])->name('auth.me');


    Route::get('posts', [PostController::class, 'index'])->name('auth.post.index');
    Route::get('posts/{id}', [PostController::class, 'show'])->name('auth.post.show');

    Route::post('posts', [PostController::class, 'store'])->name('auth.posts.store');
    Route::put('posts', [PostController::class, 'update'])->name('auth.posts.update');
    Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('auth.posts.destroy');
    */

});
