<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'billie',
            'email' => 'billie@billie.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => 'safePassword',
            'is_admin' => true
        ]);

        User::factory()
            ->count(3)
            ->hasPets(2)
            ->create();
    }
}
