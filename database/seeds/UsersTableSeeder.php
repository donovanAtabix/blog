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
            'first_name' => 'Test',
            'last_name'  => 'Atabix',
            'email'      => 'admin@example.com',
            'password'   => 'secret',
        ])->attachRole('administrator');

        User::create([
            'first_name' => 'Shop',
            'last_name'  => 'Manager',
            'email'      => 'shopmanager@example.com',
            'password'   => 'secret',
        ])->attachRole('shop-manager');

        factory(User::class, 5)->create()->each(function (User $user) {
            $user->addMedia(storage_path('/app/demo/image-avatar.png'))
                ->preservingOriginal()->toMediaCollection('avatar');
        });
    }
}
