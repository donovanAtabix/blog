<?php

namespace App\Providers;

use App\Comment;
use App\Document;
use App\Policies\CommentPolicy;
use App\Policies\DocumentPolicy;
use App\Policies\PostPolicy;
use App\Post;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class     => PostPolicy::class,
        Comment::class  => CommentPolicy::class,
        Document::class => DocumentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
