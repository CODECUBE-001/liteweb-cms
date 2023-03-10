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
            'status' => false,
        ]);    
    }

    public function __invoke()
    {
        return response()->json([
            'message' => 'Sorry this urlPath that you wrote does not exist!!',
        ]);
    }
}

