<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Default Admin Credentials;
        DB::table('admins')->insert([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'zeeshan.sidtechno@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        // Loop to generate random data for the Tables;
        for ($i = 0; $i < 200; $i++) {
            // admins
            DB::table('admins')->insert([
                'first_name' => Str::random(6),
                'last_name' => Str::random(6),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => date("Y-m-d H:i:s", mt_rand(1640998800, 1672534800)),
            ]);
        }

        for ($i = 0; $i < 200; $i++) {
            // users
            DB::table('users')->insert([
                'admin_id' => rand(1, 200),
                'first_name' => Str::random(6),
                'last_name' => Str::random(6),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => date("Y-m-d H:i:s", mt_rand(1640998800, 1672534800)),
            ]);

            // customers
            DB::table('customers')->insert([
                'admin_id' => rand(1, 200),
                'first_name' => Str::random(6),
                'last_name' => Str::random(6),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => date("Y-m-d H:i:s", mt_rand(1640998800, 1672534800)),
            ]);
        }
    }
}
