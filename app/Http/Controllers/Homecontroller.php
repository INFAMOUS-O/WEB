<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class Homecontroller extends Controller
{
    public  function index()
    {
        if(auth::id()){
            $usertype=Auth()->user()->usertype;


            if($usertype=='user')
            {
                return view('home.homepage');
            }

            else if ($usertype=='admin')
            {
                return view('admin.admin-home');
            }
            else{
                return redirect()->back();
            }
        }
    }

    public  function homepage()
    {
        return view('home.homepage');
    }
}
