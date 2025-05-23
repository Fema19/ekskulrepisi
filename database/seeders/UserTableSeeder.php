<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('12345')],
             ['name' => 'admin', 'email' => 'andika@gmail.com', 'password' => Hash::make('123456')],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']], // cek berdasarkan email
                ['name' => $user['name'], 'password' => $user['password']]
            );
        }
    }
}
