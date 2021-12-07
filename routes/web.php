<?php

    use App\Models\Category;
    use App\Models\Post;
    use App\Models\User;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('posts', [
            'posts' => Post::with('category', 'author')->latest()->get(),
            'categories' => Category::all()]);
    })->name('home');

    Route::get('posts/{post:slug}', function (Post $post) {
        return view('post', ['post' => $post, 'categories' => Category::all(),]);
    })->name('posts');

    Route::get('categories/{category:slug}', function (Category $category) {
        return view('posts', ['posts' => $category->posts, 'categories' => Category::all(), 'currentCategory' => $category ]);
    })->name('categories');

    Route::get('authors/{author:username}', function (User $author) {
        return view('posts', ['posts' => $author->posts, 'categories' => Category::all(),]);
    })->name('authors');
