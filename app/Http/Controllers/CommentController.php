<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $this->authorize('store', $post);
        $parameters = request()->validate(['description' => ['required', 'min:5']]);
        $comment = new Comment($parameters);
        $comment->post()->associate($post->id);
        $comment->user()->associate(auth()->user()->id);
        $comment->save();

        return redirect()->back();
    }

    public function show(Comment $comment, Post $post)
    {
        $this->authorize('update', $comment);
        return view('blogposts.edit-comment', [
            'comment' => $comment, 'post' => $post,
        ]);
    }

    public function update(Comment $comment, Request $request)
    {
        $this->authorize('update', $comment);
        $request->validate(['description' => ['required', 'min:5']]);
        $comment->update(request(['description']));

        return redirect()->route('posts.update', $comment->post()->get()->first()->id);
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();

        return redirect()->route('posts.update', $comment->post()->get()->first()->id);
    }
}
