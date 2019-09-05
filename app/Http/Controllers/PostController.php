<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('blogposts.index', ['posts' => $posts]);
    }

    public function store()
    {
        $attributes = request(['title', 'description']);

        $post = new Post($attributes);
        $post->user()->associate(auth()->user());
        $post->save();

        return redirect('blog');
    }

    public function create()
    {
        return view('blogposts.create');
    }

    public function show(Post $post)
    {
        $users = User::get();

        $comments = $post->comments;

        $postUserThumb = $post->user()->get()->first()->avatarThumb;
        $postUserName = $post->user()->get()->first()->display_name;

        return view('blogposts.show', [
            'post' => $post,
            'users' => $users,
            'postUserName' => $postUserName,
            'postUserThumb' => $postUserThumb,
            'comments' => $comments,
        ]);
    }

    public function edit(Post $post, Comment $comment)
    {
        $this->authorize('update', $post);
        return view('blogposts.edit', ['post' => $post, 'comment' => $comment]);
    }

    public function update(Post $post, Request $request)
    {
        $this->authorize('update', $post);
        $request->validate([ // Move to a Request class
            'title' => ['required', 'min:1'],
            'description' => ['required', 'min:1']
        ]);

        $post->update(request(['title', 'description']));

        return redirect()->route('posts.update', $post->id);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect('blog');
    }
}
