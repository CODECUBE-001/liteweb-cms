<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
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

# Defining the resource's urls
Route::resource('/blog', [PostsController::class, 'index']);













# The Fallback Route
Route::fallback( [PagesController::class, '__invoke']);