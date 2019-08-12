<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $parameters = request(['comment']);
        $comment = new Comment($parameters);
        $comment->post()->associate($post->id);
        $comment->owner()->associate($post->owner_id);
        $comment->parrent()->associate(auth()->user()->id);
        $comment->save();

        return back();
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
