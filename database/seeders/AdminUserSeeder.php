<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fname' => 'Admin',
            'lname' => 'User',
            'email' => 'adminsport@gmail.com',
            'password' => Hash::make('sport11'),
            'role' => '1', // Assuming 1 is the role for admin
            'status' => '1', // Assuming 1 means the user is approved
            'behavior' => '1', // Assuming 1 means the user is not blocked
        ]);
    }
}
