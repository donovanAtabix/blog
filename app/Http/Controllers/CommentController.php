<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Repositories\CommentRepository;
use App\Http\Requests\UpdateComment;

class CommentController extends Controller
{
    protected $comment;

    public function __construct(CommentRepository $comment)
    {
        $this->comment = $comment;
    }

    public function store(Post $post)
    {
        $this->authorize('store', $post);
        $comment = $this->comment->store($post);

        return redirect()->back();
    }

    public function show(Post $post, Comment $comment)
    {
        $this->authorize('update', $comment);
        return view('posts.edit-comment', [
            'comment' => $comment, 'post' => $post,
        ]);
    }

    public function update(Post $post, Comment $comment, UpdateComment $request)
    {
        $this->authorize('update', $comment);
        $comment->update($request->validated());

        return redirect()->route('posts.update', $comment->post()->get()->first()->id);
    }

    public function destroy(Post $post, Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();

        return redirect()->route('posts.update', $comment->post()->get()->first()->id);
    }
}
