<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // index, create, store, show, edit, update, delete, destroy

    public function index()
    {
        $posts = Post::all();

        return view('/blogposts.index', ['posts' => $posts]); // Dit kan niet, gebruik inderdaad punten, maar dan mag je geen slashes meer gebruiken gezien het de alias nodig heeft en niet het pad
    }

    public function store()
    {
        $attributes = request(['title', 'description']);

        $post = new Post($attributes);
        $post->user()->associate(auth()->user());
        $post->save();

        return redirect('/blog'); // gebruik route() helper
    }

    public function update(Post $post, Request $request)
    {
        $this->authorize('update', $post);
        $postUrl = '/blog/posts/' . $post->id; // route() helper met route names ipv paths
        $request->validate([ // Move to a Request class
            'title' => ['required', 'min:1'],
            'description' => ['required', 'min:1']
        ]);

        $post->update(request(['title', 'description']));

        return redirect($postUrl);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect('/blog');
    }

    public function createpost()
    {
        return view('/blogposts/create');
    }

    public function show(Post $post)
    {
        $users = User::get();

        $comments = $post->comments;

        foreach ($users as $user) {
            if ($post->user_id == $user->id) {
                $postUserName = $user->display_name; // Accessors & Mutators
                $postUserThumb = $user->getFirstMediaUrl('avatar', 'thumb'); // Accessors & Mutators
            }
        }

        return view('/blogposts/show', [
            'post' => $post,
            'users' => $users,
            'postUserName' => $postUserName,
            'postUserThumb' => $postUserThumb,
            'comments' => $comments,
        ]);
    }

    public function edit(Post $post, Comment $comment)
    {
        $this->authorize('update', $post);
        return view('/blogposts/edit', ['post' => $post, 'comment' => $comment]);
    }
}
