<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Dashboardcontroller extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

   public function create()
   {
    $user = Auth::user();
    return view ('dashboard',compact('user'));


   }

   public function store(Request $request)

   {
        $validatedData = $request->validate([
            'description'=>'required|max:225'
        ]);
       

        

        $post = new post;
        $post->description = $validatedData['description'];
        $post->user_id = Auth::user()->id;
        $post->save();

       

    }
}
