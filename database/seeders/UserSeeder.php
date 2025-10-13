<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'username'=>'testuser',
            'phone' => '01774656830',
            'email' => 'test@example.com',
            'password' =>Hash::make('01774656830'),
            'slug' => 'testuser',
        ]);
    }
}
