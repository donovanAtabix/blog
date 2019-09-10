<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Post;
use App\Comment;
use App\Repositories\PostRepository;
use App\User;
use App\Http\Requests\UpdatePost;

class PostController extends Controller
{
    public function index(User $user)
    {
        $posts = DB::table('posts')->latest('created_at')->paginate(15);

        return view('blogposts.index', ['posts' => $posts,]);
    }

    public function store()
    {
        $post = (new PostRepository)->store();

        return redirect('blog');
    }

    public function create()
    {
        return view('blogposts.create');
    }

    public function show(Post $post)
    {
        return view('blogposts.show', ['post' => $post,]);
    }

    public function edit(Post $post, Comment $comment)
    {
        $this->authorize('update', $post);
        return view('blogposts.edit', ['post' => $post, 'comment' => $comment]);
    }

    public function update(UpdatePost $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update($request->validated());

        return redirect()->route('posts.update', $post->id);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect('blog');
    }
}
