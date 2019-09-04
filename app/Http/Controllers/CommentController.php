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

    public function update(Comment $comment, Request $request)
    {
        $this->authorize('update', $comment);
        $postUrl = '/blog/posts/' . $comment->post()->get()->first()->id;
        $request->validate(['description' => ['required', 'min:5']]);
        $comment->update(request(['description'])); // Volgens mij kan dit niet werken; kijk even goed naar request() helper

        return redirect($postUrl);
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $postUrl = '/blog/posts/' . $comment->post()->get()->first()->id;
        $comment->delete();

        return redirect($postUrl);
    }

    public function show(Comment $comment, Post $post)
    {
        $this->authorize('update', $comment);
        return view('/blogposts/edit-comment', [
            'comment' => $comment, 'post' => $post,
        ]);
    }
}
