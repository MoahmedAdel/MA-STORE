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
        // User::create([
        //     'name' => 'Mohamed Adel',
        //     'user_name' => 'Mohamed 11',
        //     'email' => 'dev.mohamedadell@gmail.com',
        //     'password' => Hash::make('Admin@123'),
        //     'gender' => 'm',
        //     // 'phone_number' => '01114979112'
        // ]);

        User::where('email','dev.mohamedadell@gmail.com')->update([
            'role' => 'admin' 
        ]);

        // User::create([
        //     'name' => 'Moaz Adel',
        //     'user_name' => 'Moaz 11',
        //     'email' => '01200505348mohamed@gmail.com',
        //     'password' => Hash::make('Admin@123'),
        //     'gender' => 'm',
        //     // 'phone_number' => '01114979112'
        // ]);
    }
}
