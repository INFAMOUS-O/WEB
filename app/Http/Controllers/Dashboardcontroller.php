<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Dashboardcontroller extends Controller
{
    public function Dashboard()
    {
        return view('dashboard');
    }

   public function create()
   {
    $user = Auth::user();
    //dd($user);
    return view ('dashboard',compact('user'));


   }

   public function store(Request $request)
   {
    dd($request);
   }
}
