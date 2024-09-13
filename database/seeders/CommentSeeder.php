<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = json_decode(file_get_contents(database_path('json/comments.json')), true);

        foreach ($comments as $comment) {
            Comment::create(
                [
                    'content' => $comment['content'],
                    'notice_id' => $comment['notice_id'],
                    'user_id' => $comment['user_id'],
                ]
            );
        }
    }
}
