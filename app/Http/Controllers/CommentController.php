<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function store(Comment $comment, Post $post)
    {
        $comment = request(['comment']);
        Comment::create(
            $comment + ['parrent_id' => auth()->id()] +
                ['owner_id' => $post->owner_id]
        );

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
