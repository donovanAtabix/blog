<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();
        //$posts = Post::where('owner_id', Auth::user()->id)->get();

        return view('/blogposts/index', ['posts' => $posts]);
    }

    public function store()
    {
        //dd('exit');
        $attributes = request(['title', 'post']);
        Post::create($attributes + ['owner_id' => auth()->id()]);

        return redirect('/blogposts/index');
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }

    public function creatpost()
    {
        return view('blogposts/createpost');
    }

    public function show(Post $post)
    {
        return view('/blogposts/show', ['post' => $post]);
    }
}
