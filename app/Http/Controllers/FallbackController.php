<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FallbackController extends Controller
{
    
    public function __invoke()
    {
        return response()->json([
            'message' => 'Sorry this urlPath that you wrote does not exist!!',
        ]);
    }

}
