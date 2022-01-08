<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString();

        return view(
            'posts.index',
            [
                'posts' => $posts,
            ]
        );
    }

    public function create()
    {
        return view('posts.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(){
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'slug' => ['required',Rule::unique('posts','slug')],
            'body' => 'required',
           'category_id' => ['required',Rule::exists('categories','id')]
        ]);

        $attributes['user_id'] = auth()->id();
        Post::create($attributes);
        return redirect('/')->with('success','Post Created');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post, 'categories' => Category::all(),]);
    }
}
