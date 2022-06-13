<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()
            ->count(1)
            ->create();
            
        \App\Models\User::factory()->create([
            'name' => 'John Doe',
            'email' => 'nagylaszlolacko@gmail.com',
        ]);
            
        \App\Models\Website::factory()
            ->count(1)
            ->hasPosts(rand(1, 5))
            ->create();
    }
}
