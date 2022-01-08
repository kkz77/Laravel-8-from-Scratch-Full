<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SessionController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts');
Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');
Route::get('admin/posts/create',[PostController::class,'create'])->middleware('is_admin');
Route::post('admin/posts',[PostController::class,'store'])->middleware('is_admin');

Route::get(
    'authors/{author:username}',
    function (User $author) {
        return view('posts', ['posts' => $author->posts]);
    }
)->name('authors');


Route::post('newsletter', ServiceController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy']);
Route::get('login', [SessionController::class, 'create']);
Route::post('login', [SessionController::class, 'store']);


