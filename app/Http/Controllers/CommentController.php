<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('posts.show', $post);
    }
}