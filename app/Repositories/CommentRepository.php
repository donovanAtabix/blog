<?php

namespace App\Repositories;

use App\Comment;
use App\Post;

class CommentRepository
{
    public function store(Post $post)
    {
        $parameters = request()->validate(['description' => ['required', 'min:5']]);
        $comment = new Comment($parameters);
        $comment->post()->associate($post->id);
        $comment->user()->associate(auth()->user()->id);
        $comment->save();
    }

    public function update()
    {
        //
    }
}
