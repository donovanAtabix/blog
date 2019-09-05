<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 5; $i++) {
            DB::table('users')->insert([
                'name' => 'user' . $i,
                'email' => 'user' . $i . '@test.com',
                'password' => bcrypt('Password01@'),
                'avatar_name' => 'user' . $i,
            ]);
        }

        $this->call(PostsTableSeeder::class);
    }
}
