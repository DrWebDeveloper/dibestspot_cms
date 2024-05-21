<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'DiBestSpot',
            'username' => 'admin',
            'email' => 'admin@dibestspot.com',
            'phone_number' => '00923174499144',
            'country' => 'Pakistan',
            'email_verified_at' => now(),
            'password' => Hash::make('12345abc'),
            'avatar' => 'https://ui-avatars.com/api/?name=Admin+DiBestSpot&color=7F9CF5&background=EBF4FF',
            'api_token' => Str::random(60),
            'role' => 'admin',
            'status' => 'active',
            'remember_token' => Str::random(10),
        ]);
    }
}
