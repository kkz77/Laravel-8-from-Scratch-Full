<?php

    use App\Models\Category;
    use App\Models\Post;
    use App\Models\User;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('posts', ['posts' => Post::with('category','user')->get()]);
    });

    Route::get('posts/{post:slug}', function (Post $post) {
        return view('post', ['post' => $post]);
    });

    Route::get('categories/{category:slug}', function (Category $category) {
        return view('posts', ['posts' => $category->posts]);
    });

    Route::get('authors/{user}', function (User $user) {
        return view('posts', ['posts' => $user->posts]);
    });
