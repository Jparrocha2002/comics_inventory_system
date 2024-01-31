<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = 'jerry Molar Parrocha';
        $email = 'j.parrocha@gmail.com';
        $role = 'Admin';
        $status = 'Active';

        DB::table('users')->insert ([
            [
                'name' => $name,
                'email' => $email,
                'role' => $role,
                'status' => $status,
                'password' => Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => now(),
                'updated_at' => now(),

            ],
        ]);
    }
}
