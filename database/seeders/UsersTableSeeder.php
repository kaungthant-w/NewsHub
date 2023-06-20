<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            //admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'address' => "kalay myo",
                'email' => "admin@gmail.com",
                'phone' => "09977246321",
                'password' => Hash::make('password'),
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'name' => 'user',
                'username' => 'user',
                'address' => "kalay myo",
                'phone' => "09323239823",
                'email' => "user@gmail.com",
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => 'active',
            ]
        ]);
    }
}
