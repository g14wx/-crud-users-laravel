<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = app(Generator::class);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => $faker->email(),
            'age' => 10,
            'password' => '$2y$10$wrmXTPESwk6TUo6nQ4N2LOc8fRBXrRHBGcf54UkAkmK.AJa/NQpri' // password
        ]);
    }
}
