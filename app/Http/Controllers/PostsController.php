<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    # Stops any user that isn't logged-in from accessing some vital functions of the blog
    public function __construct() 
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Inside the blog as an Admin!!!'
        ]);

        # return view('blog.index')
        #      ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        # Returning a view to it's create participant
        # return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        # Validations to consider before saving up any post
        $request->validate([
            'title' => 'required', 
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        # Giving the Image a uniqId that changes on every image added
        $newImageName = uniqid() . '-'. $request->title . 
        $request->image->extension();

        # Moving the newly created Image to the public directory
        $request->image->move(public_path('images'), $newImageName);

        # Making the slug title
        # $slug = 

        # Finally making the Post
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            // 'slug' => SlugService::createSlug(Post::class, 'slug',
            // $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        # Adding a message when a post has been made successfully or not
        return redirect('/blog')->with('message', 'Your post has been added');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        # For showing a specific post(We needed the slug to do it for us)
        return view('blog.show')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        # For the Editing Process
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        #Validation to consider before updating a POST
        $request->validate([
            'title' => 'required', 
            'description' => 'required',
            //'image' => 'required|mimes:jpg,png,jpeg|max:1048'
        ]);

        # Updating a or the specific post 
        Post::where('slug', $slug)
        ->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            // 'slug' => SlugService::createSlug(Post::class, 'slug',
            // $request->title),
            'user_id' => auth()->user()->id
        ]);
        
        return redirect('/blog')
            ->with('message', 'Your post has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')
            ->with('message', 'Your initial post has been deleted!!');
    }
}
