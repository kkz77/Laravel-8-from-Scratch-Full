<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();

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

    public function author(User $author) {
        return view('posts', ['posts' => $author->posts]);
    }
}
