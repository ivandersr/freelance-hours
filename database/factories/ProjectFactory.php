<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $result = [
            'title' => collect(fake()->words(5))->join(' '),
            'description' => htmlspecialchars(fake()->randomHtml()),
            'ends_at' => fake()->dateTimeBetween('now', '+3 days'),
            'status' => fake()->randomElement(['open', 'closed']),
            'teck_stack' => json_encode(fake()->randomElements([
                'laravel',
                'php',
                'react',
                'python',
                'javascript',
                'nextjs'
            ], random_int(1, 5))),
            'created_by' => User::factory(),
        ];

        return $result;
    }
}
