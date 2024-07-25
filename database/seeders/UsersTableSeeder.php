<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'raflcbse2021@gmail.com',
            'password' => Hash::make('raflcbse@123'),
            'created_at' => now(),
            'updated_at' => now(),
    ]);
    }
}
