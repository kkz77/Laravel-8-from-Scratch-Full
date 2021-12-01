<?php

    use App\Models\Category;
    use App\Models\Post;
    use App\Models\User;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('posts', ['posts' => Post::with('category','author')->get()]);
    });

    Route::get('posts/{post:slug}', function (Post $post) {
        return view('post', ['post' => $post->load(['category','author'])]);
    });

    Route::get('categories/{category:slug}', function (Category $category) {
        return view('posts', ['posts' => $category->posts->load(['category','author'])]);
    });

    Route::get('authors/{author:username}', function (User $author) {
        return view('posts', ['posts' => $author->posts->load(['category','author'])]);
    });
