<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=> 'user',
                'email'=> 'user@gmail.com',
                'role'=> 'user',
                'password'=>bcrypt('12345678')
            ],
            [
                'name'=> 'admin',
                'email'=> 'admin@gmail.com',
                'role'=> 'admin',
                'password'=>bcrypt('12345678')
            ]
        ];
        foreach($userData as $key=> $val){
            User::create($val);

        }
    }
}
