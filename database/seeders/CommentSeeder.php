<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['post_id' => 1, 'user_id' => 1, 'comment' => 'Interesting.'],
            ['post_id' => 2, 'user_id' => 3, 'comment' => 'Marvelous.'],
            ['post_id' => 3, 'user_id' => 2, 'comment' => 'Fascinating.'],
        ];
        Comment::insert($data);
    }
}
