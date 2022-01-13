<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts');
Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');

Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('is_admin')->name('create-posts');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('is_admin');
Route::get('admin/dashboard',[AdminPostController::class,'index'])->middleware('auth')->name('dashboard');
Route::get('admin/posts/{post}/edit',[AdminPostController::class,'edit'])->middleware('is_admin');
Route::patch('admin/posts/{post}/update',[AdminPostController::class,'update'])->middleware('is_admin');
Route::delete('admin/posts/{post}/delete',[AdminPostController::class,'destroy'])->middleware('is_admin');


Route::get('authors/{author:username}', [PostController::class, 'author'])->name('authors');


Route::post('newsletter', ServiceController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy']);
Route::get('login', [SessionController::class, 'create']);
Route::post('login', [SessionController::class, 'store']);


