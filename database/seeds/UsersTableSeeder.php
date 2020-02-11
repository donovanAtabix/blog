<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'          => 'Test',
            'email'         => 'admin@example.com',
            'password'      => 'secret',
            'avatar_name'   => 'admin',
        ])->each(function (User $user) {
            $user->attachRole('administrator');

            $user->addMedia(storage_path('/app/demo/image-avatar.png'))
                ->preservingOriginal()->toMediaCollection('avatar');
        });

        User::create([
            'name'          => 'Employee',
            'email'         => 'employee@example.com',
            'password'      => 'secret',
            'avatar_name'   => 'employee',
        ])->each(function (User $user) {
            $user->attachRole('project-manager');

            $user->addMedia(storage_path('/app/demo/image-avatar.png'))
                ->preservingOriginal()->toMediaCollection('avatar');
        });

        factory(User::class, 5)->create()->each(function (User $user) {
            $user->attachRole('employee');
            $user->addMedia(storage_path('/app/demo/image-avatar.png'))
              ->preservingOriginal()->toMediaCollection('avatar');
        });
    }
}
