<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Dashboardcontroller extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('dashboard',compact('posts'));
    }

   public function create()
   {
    $user = Auth::user();
    return view ('dashboard',compact('user'));


   }

   public function store(Request $request)

   {
        $validatedData = $request->validate([
            'description'=>'required|max:225',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

       

        

        $post = new post;
        $post->description = $validatedData['description'];
        $post->user_id = Auth::user()->id;

        if($request->hasfile('image'))
          {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('public/uploads/',$filename);
            $post->image = $filename;
        }
        $post->save();

        return redirect()->back();

       

    }
}
