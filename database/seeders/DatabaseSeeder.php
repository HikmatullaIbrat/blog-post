<?php

namespace Database\Seeders;

use App\Models\Post;
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
        $this->call(SettingsTableSeeder::class);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // it means generate 15 fake posts
        // Post::factory(15)->create();

        // To ensure your seeder runs, you need to call it from the DatabaseSeeder class. Open database/seeders/DatabaseSeeder.php and add the following line to the run method:
        $this->call([PostSeeder::class,]);
    }
}
