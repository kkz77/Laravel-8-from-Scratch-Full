<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function store(Post $post): RedirectResponse
    {
       request()->validate([
           'body' => 'required'
       ]);

      $post->comments()->create([
          'user_id' => auth()->id(),
          'body' => request('body')
      ]);

      return back();
    }
}
