<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;



class Homecontroller extends Controller
{
    // public  function index()
    // {
    //     if(auth::id()){
    //         $usertype=Auth()->user()->usertype;


    //         if($usertype=='user')
    //         {
    //             $posts = Post::all();
    //             return view('home.homepage',compact('posts'));
    //         }

    //         else if ($usertype=='admin')
    //         {
    //             return view('admin.admin-home');
    //         }
    //         else{
    //             $posts = Post::all();
    //             return view('home.homepage',compact('posts'));
    //         }
    //     }
    // }

   
    public  function index()
    {
        $comments = Comment::all();
        $posts = Post::all();
        return view('home.homepage',compact('posts'));            
    }

 

    
}
