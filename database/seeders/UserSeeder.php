<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'name' => 'admin',
                    'lastname' => null,
                    'password' => Hash::make('administrator'),
                    'tel' => '+70000000000',
                    'email' => 'admin@admin.com',
                    'role'=>'admin'
                ],
            ]
        );
    }
}
