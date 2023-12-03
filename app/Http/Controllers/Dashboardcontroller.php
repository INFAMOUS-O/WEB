<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    public function Dashboard()
    {
        return view('dashboard');
    }
}
