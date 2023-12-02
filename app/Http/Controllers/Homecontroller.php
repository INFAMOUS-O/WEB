<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public  function homepage()
    {
        return view('home.homepage');
    }
}
