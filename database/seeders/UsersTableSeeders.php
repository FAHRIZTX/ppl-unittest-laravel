<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		DB::table('users')->insert([
            'name' => 'dimas',
            'email' => 'dimas@gmail.com',
            'password' => Hash::make('dimas')
        ]);

		DB::table('users')->insert([
            'name' => 'wahyu',
            'email' => 'wahyu@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('wahyu')
        ]);
    }
}
