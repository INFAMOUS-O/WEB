<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    public function Dashboard()
    {
        return view('dashboard');
    }

    public function Dashboardposting(Request $request)
    {
        $user=Auth()->user();
        $userid=$user->id;

        $post = new Post;
        $post->image = $request->image;

        $image = $request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtensions();

            $request->image->move('postname',$imagename);

            $post->image=$imagename;


        }

        $post->save();

        return redirect()->back();

        
    }
}
