<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'shari',
            'email' => 'shari@gmail.com',
            'username' => 'shaharyar',
            'password' => Hash::make('admin123'),
            'profile_image' => 'default.png',
        ]);
    }
}
