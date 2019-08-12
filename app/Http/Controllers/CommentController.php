<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $parameters = request()->validate(['comment' => ['required', 'min:5']]);
        $comment = new Comment($parameters);
        $comment->post()->associate($post->id);
        $comment->owner()->associate($post->owner_id);
        $comment->parrent()->associate(auth()->user()->id);
        $comment->save();

        return back();
    }

    public function update(Comment $comment)
    {
        request()->validate(['comment' => ['required min:5']]);

        $comment->update()->validate(['comment' => ['required min:5']]);

        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect('/blogposts/index');
    }

    public function edit(Comment $comment, Post $post)
    {
        return view('/blogposts/edit-comment', ['comment' => $comment, 'post' => $post]);
    }
}
