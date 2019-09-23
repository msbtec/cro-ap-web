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
            'password'       => '$2y$10$DVL36XPaI5Mq4KhxH3DFMu7/5ezIpQACCHhNaxrg2beo7k3RNbXn2',
            'remember_token' => null,
            'created_at'     => '2019-08-21 20:54:32',
            'updated_at'     => '2019-08-21 20:54:32',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
