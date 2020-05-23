<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@test.com',
                'is_admin'=>'1',
                'password'=> bcrypt('password'),
            ],
            [
                'name'=>'User',
                'email'=>'user@test.com',
                'is_admin'=>'0',
                'password'=> bcrypt('password'),
            ],
            [
                'name'=>'User2',
                'email'=>'user2@test.com',
                'is_admin'=>'0',
                'password'=> bcrypt('password'),
            ],
        ];
        
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
