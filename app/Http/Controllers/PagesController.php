<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() 
    {
        return response()->json([
            'data' => null,
            'message' => 'This should be the landing page for the Home of the CMS blog!!',
            'status' => true,
        ]);    
    }

        # Checking to see if my /blog works fine. and yes it does but one has to be logged in so as to access the /blog.
    // public function check()
    // {
    //     return response()->json([
    //         'message' => 'Inside the blog as an Admin!!!',
    //     ]);

    //     //  return view('blog.index')
    //     //     ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    // }
}

