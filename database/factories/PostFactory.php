<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->paragraph(1);
        return [
            // 'image' => fake()->imageUrl(),
            'image' => "posts/ie7eWy1S98nKpETYd3VQcJ5IH1j70x3bTuHScNLd.png",
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'content' => fake()->paragraph(5),
            'category_id' => Category::inRandomOrder()->first()->id,
            'user_id' =>  User::inRandomOrder()->first()->id,
            // 'user_id' => User::all()->first()->id,
            'publish_at' => fake()->optional()->dateTime(),

        ];
    }
}
