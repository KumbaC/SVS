<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
            PositionSeeder::class,
            TypeCoinSeeder::class,
        ]);
        
         \App\Models\User::factory()->create([
             'name' => 'Antonio',
             'last_name' => 'Puerta',
             'password' => 'password',
             'email' => 'antoniolenovo115@gmail.com',
             'identification' => '27597000',
             'position_id' => 1,
         ]);
    }
}
