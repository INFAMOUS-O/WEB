<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        // $post->comments()->create([
        //     'user_id' => auth()->id(),
        //     'name' =>  Auth::user()->name,
        //     'content' => $request->input('content'),
        // ]);

        $comment = new comment;
        $comment->content = $request->input('content');
        $comment->post_id = $post->id;
        $comment->name = Auth::user()->name;

        $comment->save();

        return redirect()->route('posts.show', $post);
    }

        public function index($postId)
    {
        $post = Post::findOrFail($postId);

        if (request()->ajax()) {
            return response()->json(view('comments.index', compact('post'))->render());
        }

        return view('comments.index', compact('post'));
    }
}
