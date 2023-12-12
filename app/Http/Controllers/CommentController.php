<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'content' => 'required|max:225',
        ]);
    
        $post = Post::find($id);
    
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }
    
        $comment = new Comment();
        $comment->content = $validatedData['content'];
        $post->comments()->save($comment); // Associate the comment with the post
    
        return redirect()->back()->with('success', 'Comment posted successfully');
    }

    
    
}
