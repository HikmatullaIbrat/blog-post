<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeder are used to create fake data
        Post::create(['title'=>'Kabul City', 'sub_title'=>'Kabul is the Capital of Afghanistan.', 'description'=>'Kabul is the Capital of Afghanistan.Kabul is the Capital of Afghanistan.Kabul is the Capital of Afghanistan.','slug'=>Str::slug('Kabul')]);
    }
}
