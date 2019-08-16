<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$UWJB8FCeYAnQi17R5o./t.3PPLHJHbK0GnUOykvQZnjl0MhuxJr1W',
            'remember_token' => null,
            'created_at'     => '2019-08-14 23:39:53',
            'updated_at'     => '2019-08-14 23:39:53',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
