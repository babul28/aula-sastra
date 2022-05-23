<?php

namespace Database\Factories;

use App\Enums\PostStatusEnum;
use App\Enums\PostTypeEnum;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
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
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'body' => $this->faker->paragraph,
            'status' => PostStatusEnum::PUBLISHED,
            'type' => PostTypeEnum::ARTWORKS,
            'meta' => [
                'description' => $this->faker->paragraph,
                'title' => $this->faker->sentence,
            ],
        ];
    }

    public function artwork()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => PostTypeEnum::ARTWORKS,
            ];
        });
    }

    public function news()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => PostTypeEnum::NEWS,
            ];
        });
    }

    public function draft()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => PostStatusEnum::DRAFT,
            ];
        });
    }

    public function trashed()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => PostStatusEnum::TRASHED,
                'deleted_at' => now(),
            ];
        });
    }
}
