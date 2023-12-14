<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class Homecontroller extends Controller
{
    public  function index()
    {
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;


            if($usertype=='user')
            {
                $posts = Post::all();
                return view('home.homepage',compact('posts'));
            }

            else if ($usertype=='admin')
            {
                return view('admin.admin-home');
            }

            
        }
                    
        $posts = Post::all();
        return view('home.homepage',compact('posts'));
    }

   
    // public  function index()
    // {

    //     $posts = Post::all();
    //     return view('home.homepage',compact(['posts']));            
    // }

    public function show(Post $post)
    {
        return view('home.post', compact('post'));
    }

 

    
}
