<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'role' => 'admin',
                'contact' => '123456778',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'approve_status' => 'approved',
                'status' => 'active',
            ],
              [
                'name' => 'Instructor User',
                'role' => 'instructor',
                'contact' => '123456778',
                'email' => 'instructor@gmail.com',
               'password' => Hash::make('password'),
                'approve_status' => 'approved',
                'status' => 'active'
              ],
                 [
                'name' => 'Student User',
                'role' => 'student',
                'contact' => '123456778',
                'email' => 'student@gmail.com',
               'password' => Hash::make('password'),
                'approve_status' => 'approved',
                'status' => 'active'
            ]
        ];

        User::insert($users);
    }
}
