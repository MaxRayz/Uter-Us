<?php

namespace Database\Seeders;

use App\Models\Period;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Fixed test user with 15 period records
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('admin123'),
        ]);

        Period::factory(15)->create(['user_id' => $testUser->id]);

        // 3 additional random users with 5 periods each
        User::factory(3)->create()->each(function (User $user) {
            Period::factory(5)->create(['user_id' => $user->id]);
        });
    }
}
