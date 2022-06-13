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
            ->count(10)
            ->create();
        $users = \App\Models\User::all();
        // \App\Models\User::factory()->create([
        //     'name' => 'John Doe',
        //     'email' => 'nagylaszlolacko@gmail.com',
        // ]);
            
        \App\Models\Website::factory()
            ->count(10)
            ->hasPosts(rand(1, 5))
            ->create();

        \App\Models\Website::all()->each(function ($website) use ($users) {
            $website->users()->attach(
                $users->random(rand(0, 3))->pluck('id')->toArray()
            );
        });
    }
}
