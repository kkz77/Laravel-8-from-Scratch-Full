<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class,'index'])->name('home');

Route::get('posts/{post:slug}',[PostController::class,'show'])->name('posts');

Route::get(
    'authors/{author:username}',
    function (User $author) {
        return view('posts', ['posts' => $author->posts, 'categories' => Category::all(),]);
    }
)->name('authors');
