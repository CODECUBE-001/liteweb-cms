<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FallbackController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


# Making the route for the home page 
Route::get('/', [PagesController::class, 'index']);

# Was just checking here to see maybe my message for the /blog endpoint was working, and yes it was
Route::get('/blog', [PagesController::class, 'check']);

# Defining the resource's urls
// Route::resource('/blog', PostsController::class);

# The Fallback Route
Route::fallback([FallbackController::class, '__invoke']);

#