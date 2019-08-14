<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $parameters = request()->validate(['description' => ['required', 'min:5']]);
        $comment = new Comment($parameters);
        $comment->post()->associate($post->id);
        $comment->owner()->associate($post->owner_id);
        $comment->parent()->associate(auth()->user()->id);
        $comment->save();

        return back();
    }

    public function update(Comment $comment, Request $request)
    {
        $this->authorize('update', $comment);
        $request->validate(['description' => ['required', 'min:5']]);
        $comment->update(request(['description']));

        return back();
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();

        return redirect('/blogposts/index');
    }

    public function edit(Comment $comment, Post $post)
    {
        $this->authorize('update', $comment);
        return view('/blogposts/edit-comment', ['comment' => $comment, 'post' => $post]);
    }
}
