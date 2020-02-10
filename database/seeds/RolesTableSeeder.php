<?php

use App\Roles;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Administrator',
                'slug' => 'administrator',
            ],
            [
                'name' => 'Project-manager',
                'slug' => 'project-manager',
            ],
            [
                'name' => 'Team-lead',
                'slug' => 'team-lead',
            ],
            [
                'name' => 'Employee',
                'slug' => 'Employee',
            ],
        ];

        foreach ($roles as $role) {
            Roles::create($role);
        }
    }
}
