<?php

namespace Database\Seeders;

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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('c@rabine21'),
            'permissions' => [
                'articles' => 'full',
                'contacts' => 'full',
                'settings' => 'full',
                'profile' => 'full',
                'laws' => 'full',
            ],
        ]);

        //{"laws": "full", "profile": "full", "articles": "full", "contacts": "full", "settings": "full"}
    }
}
