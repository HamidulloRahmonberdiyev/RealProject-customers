<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'name' => 'Hamidullo',
            'email' => 'hamidullo0760@gmail.com',
            'password' => Hash::make('hamidullo2002'),
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('secret'),
        ]);
    }
}
