<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'timestamp' => $this->faker->dateTimeThisMonth(),
            'description' => $this->faker->text(),
            'server_id' => \App\Models\Server::inRandomOrder()->first()->id,
        ];
    }
}
