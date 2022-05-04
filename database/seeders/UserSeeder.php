<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'photo' => 'http//:20180107_113120',
            'name' => 'super admin',
            'user_type' => 'super_admin',
            'email' => 'jbukola95@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'photo' => ' <img src="{{ asset($user->photo) }}" alt="{{$user->name}}" width="60" height="70">',
            'name' => 'Admin',
            'user_type' => 'admin',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'photo' => ' <img src="{{ asset($user->photo) }}" alt="{{$user->name}}" width="60" height="70">',
            'name' => 'Libarian',
            'user_type' => 'libarian',
            'email' => 'libarian@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'photo' => 'http//:20180107_113120',
            'name' => 'Teacher',
            'user_type' => 'teacher',
            'email' => 'teacher1@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'photo' => 'http//:20180107_113120',
            'name' => 'Parent',
            'user_type' => 'parent',
            'email' => 'parent1@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'photo' => 'http//:20180107_113120',
            'name' => 'Accountant',
            'user_type' => 'accountant',
            'email' => 'accountant1@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'photo' => 'http//:20180107_113120',
            'name' => 'Student',
            'user_type' => 'student',
            'email' => 'student1@gmail.com',
            'password' => Hash::make('password'),
        ]);






    }  
}
