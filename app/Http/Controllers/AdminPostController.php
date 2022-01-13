<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view(
            'admin.dashboard',
            [
                'posts' => Post::paginate(15),
            ]
        );
    }

    public function create()
    {
        return view('posts.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'slug' => ['required',Rule::unique('posts','slug')],
            'body' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        Post::create($attributes);
        return redirect('/')->with('success','Post Created');
    }

    public function edit(Post $post)
    {
        return view(
            'admin.edit',
            [
                'post'       => $post,
                'categories' => Category::all(),
            ]
        );
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate(
            [
                'title'       => 'required',
                'excerpt'     => 'required',
                'slug'        => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
                'body'        => 'required',
                'category_id' => ['required', Rule::exists('categories', 'id')],
            ]
        );

        $attributes['user_id'] = auth()->id();
        if ($request->file('thumbnail')) {
            $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);
        return back()->with('success','Post Updated');
    }

    public function destroy(Post $post){
        $post->delete();
        return back()->with('success','Post Deleted');
    }
}
