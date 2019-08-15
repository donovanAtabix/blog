<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();

        return view('/blogposts/index', ['posts' => $posts]);
    }

    public function store()
    {
        $attributes = request(['title', 'description']);

        $post = new Post($attributes);
        $post->user()->associate(auth()->user());
        $post->save();

        return redirect('/blogposts');
    }

    public function update(Post $post, Request $request)
    {
        $this->authorize('update', $post);
        $request->validate([
            'title' => ['required', 'min:1'],
            'description' => ['required', 'min:1']
        ]);

        $post->update(request(['title', 'description']));

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect('/blogposts');
    }

    public function createpost()
    {
        return view('/blogposts/create');
    }

    public function show(Post $post)
    {
        return view('/blogposts/show', ['post' => $post, 'comments' => $post->comments]);
    }

    public function edit(Post $post, Comment $comment)
    {
        $this->authorize('update', $post);
        return view('/blogposts/edit', ['post' => $post, 'comment' => $comment]);
    }
}
