<?php

namespace Database\Factories;

// use App\Models\User;        // only if you use factory
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            // 'user_id' => User::factory(),
            'title' => $this->faker->sentence(7, 11),
            'post_image' => $this->faker->imageUrl('900', '300'),
            'body' => $this->faker->paragraphs(rand(10, 15), true),
            'path' => ""
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
