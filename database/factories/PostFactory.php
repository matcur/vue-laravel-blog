<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        $userId = User::limit(5)->get()->random()->id;
        $imgs = ['imgs/1.jpg', 'imgs/2.jpg'];

        $isPublished = rand(1, 10) > 2;
        $publishedAt = $isPublished? $faker->dateTimeBetween('-10 days', '-1 days'): null;
        $hasThumbnail = rand(1, 10) > 2;
        $thumbnailPath = $hasThumbnail? $imgs[rand(0, 1)]: null;

        return [
            'title' => $faker->text('40'),
            'description' => $faker->realText('120'),
            'content' => $faker->realText('599'),
            'is_published' => $isPublished,
            'published_at' => $publishedAt,
            'thumbnail_path' => $thumbnailPath,
            'user_id' => $userId,
        ];
    }
}
