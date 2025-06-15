<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        \DB::table('user_cms')->insert([
                    [
                    'name'=>'superadmin',
                    'email'=>'superadmin@mail.com',
                    'password'=>\Hash::make('superadmin'),
                    'display'=>0
                    ],
                    [
                    'name'=>'admin',
                    'email'=>'admin@mail.com',
                    'password'=>\Hash::make('admin'),
            'display'=>1
            ]
        ]);
    }
}
