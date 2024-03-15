<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'is_active'   => true,
            'password' => Hash::make('admin@gmail.com'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('admin');

        // Creating User
        $user = User::create([
            'name' => 'Koto',
            'email' => 'koto@mail.com',
            'is_active'   => true,
            'password' => Hash::make('koto@mail.com'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('user');

    }
}
