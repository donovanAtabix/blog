<?php

use App\Comment;
use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 20)->create()->each(function (Post $post) {
            factory(Comment::class, rand(1, 10))->create(['post_id' => $post->id]);
        });
    }
}
