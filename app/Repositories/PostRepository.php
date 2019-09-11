<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    public function store(array $attributes)
    {
        $post = new Post($attributes);
        $post->user()->associate(auth()->user());
        $post->save();

        return $post;
    }

    public function paginate()
    {
        $post = Post::latest('created_at')->paginate(15);

        return $post;
    }
}
