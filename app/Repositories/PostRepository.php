<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    public function store()
    {
        $attributes = request(['title', 'description']);

        $post = new Post($attributes);
        $post->user()->associate(auth()->user());
        $post->save();
    }
}
