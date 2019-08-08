<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
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
        $attributes = request(['title', 'post']);

        $post = new Post($attributes);
        $post->user()->associate(auth()->user());
        $post->save();

        return redirect('/blogposts/index');
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => ['required', 'min:1'],
            'post' => ['required', 'min:1']
        ]);

        $post->update(request(['title', 'post']));

        return back();
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/blogposts/index');
    }

    public function creatpost()
    {
        return view('/blogposts/create');
    }

    public function show(Post $post)
    {
        return view('/blogposts/show', ['post' => $post]);
    }

    public function edit(Post $post, Comment $comment)
    {
        return view('/blogposts/edit', ['post' => $post, 'comment' => $comment]);
    }
}
