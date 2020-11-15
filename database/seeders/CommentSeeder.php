<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postsIds = Post::get()->pluck('id');

        foreach ($postsIds as $postId) {
            $comments = Comment::factory()
                ->count(rand(1, 5))
                ->create([
                    'commentable_id' => $postId,
                    'commentable_type' => Post::class,
                ]);

            $comments->each(function (Comment $comment) use ($postId) {
                $this->createChildComments($comment, $postId);
            });
        }
    }

    private function createChildComments(Comment $comment, $commentableId)
    {
        Comment::factory()
            ->count(rand(1, 3))
            ->create([
                'commentable_id' => $commentableId,
                'commentable_type' => Post::class,
                'parent_comment_id' => $comment->id,
            ]);
    }
}
