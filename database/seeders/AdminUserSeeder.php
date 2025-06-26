<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Admin DevAcademy',
                'email' => 'admin@devacademy.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'), // password: admin
                'remember_token' => Str::random(10),
            ]
        );
    }
}
