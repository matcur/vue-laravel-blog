<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory()
            ->count(30)
            ->create();

        /** @var Collection $tags */
        $tags = Category::get('id')->pluck('id');

        $posts->each(function (Post $post) use ($tags) {
            $tagsCount = rand(1, $tags->count());
            $randomTagIds = $tags->slice(0, $tagsCount);
            $post->categories()->attach($randomTagIds);
        });
    }
}
