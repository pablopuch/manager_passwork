<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Passork>
 */
class PassworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'user_pass' => fake()->userName(), 
            'email_pass' => fake()->unique()->safeEmail(),
            'password_pass' => fake()->password(),
            'link' => fake()->url(),
            'note' => fake()->text($maxNbChars = 200),
            'url_img' => fake()->imageUrl($width = 640, $height = 480, 'img'),
            'favourite'=> fake()->boolean(),
        ];
    }
}
