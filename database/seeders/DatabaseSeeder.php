<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Tim',
            'email' => 'tim26618@gmail.com',
            'is_admin' => true
        ]);
        User::factory()->create([
            'name' => 'Laura',
            'email' => 'laura@gmail.com',
        ]);
        \App\Models\Listing::factory(10)->create([
            'by_user_id' => 1
        ]);
        \App\Models\Listing::factory(10)->create([
            'by_user_id' => 2
        ]);
        \App\Models\Listing::factory(20)->create([
            'by_user_id' => 1
        ]);

    }
}
