<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'demo@test.com'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('Demo.Password1'),
                'email_verified_at' => now(),
            ]
        );
    }
}