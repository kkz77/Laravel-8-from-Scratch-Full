<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(request(['search', 'category','author']))->paginate(5)->withQueryString();

        return view(
            'posts.index',
            [
                'posts' => $posts,
            ]
        );
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post, 'categories' => Category::all(),]);
    }
}
