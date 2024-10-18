<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'Interesting title', 'content' => 'This is interesting content.', 'user_id' => 3],
            ['title' => 'Marvelous title', 'content' => 'This is marvelous content.', 'user_id' => 2],
            ['title' => 'Fascinating title', 'content' => 'This is fascinating content.', 'user_id' => 1],
        ];

        Post::insert($data);
    }
}
