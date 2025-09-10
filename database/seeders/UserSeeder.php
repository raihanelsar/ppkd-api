<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '12345678',
            ],
            [
                'name' => 'Raihan',
                'email' => 'raihan@gmail.com',
                'password' => '12345678',
            ],
            [
                'name' => 'Fadli',
                'email' => 'fadli@gmail.com',
                'password' => '12345678',
            ],
            [
                'name' => 'Faris',
                'email' => 'faris@gmail.com',
                'password' => '12345678',
            ],
            [
                'name' => 'Vicki',
                'email' => 'vicki@gmail.com',
                'password' => '12345678',
            ],
            [
                'name' => 'Umar',
                'email' => 'umar@gmail.com',
                'password' => '12345678',
            ],
        ];

        User::insert($users);
    }
}
