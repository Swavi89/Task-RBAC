<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Swaviman Sahoo',
            'email' => 'swaviman89@gmail.com',
            'mobile' => 8093478546,
            'password' => Hash::make('Putulu@478546'),
        ]);
    }
}
