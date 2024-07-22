<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Instantiate Faker
        $faker = Faker::create();

        // Insert 10 users
        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name, // Generate a random name
                'email' => $faker->unique()->safeEmail, // Generate a unique email
                'password' => Hash::make('123'), // Hash the password
            ]);
        }
    }
}
