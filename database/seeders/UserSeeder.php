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
        User::create([
            'name' => 'Sandi Maulidika',
            'email' => 'admin@gmail.com',
            'nowa' => '08530000000',
            'password' => Hash::make('admin'),
            'role_id' => '1',
            'is_admin' => '1'
        ]);
    }
}
