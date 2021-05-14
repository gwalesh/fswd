<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[

            'id' => 1,
            'name' => 'User',
            'email' => 'user@user.com',
            'phone' => '9179969932',
            'password' => bcrypt('password'),
        ];

        User::insert($users);
    }
}
