<?php

namespace Database\Factories;

use App\Models\Server;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {

        $porcentaje = rand(0, 100);
        if ($porcentaje >= 0 && $porcentaje <= 30) {
            if($porcentaje > 15){
                return [
                    'ipv4' => "",
                    'ipv6' => $this->faker->unique()->ipv6,
                    'location' => $this->faker->text,
                    'description' => $this->faker->text,
                ];
            } else if($porcentaje <= 15){
                return [
                    'ipv4' => $this->faker->unique()->ipv4,
                    'ipv6' => $this->faker->unique()->ipv6,
                    'location' => $this->faker->text,
                    'description' => $this->faker->text,
                ];
            }
        } else if($porcentaje > 30 && $porcentaje <= 100){
            return [
                'ipv4' => $this->faker->unique()->ipv4,
                'ipv6' => "",
                'location' => $this->faker->text,
                'description' => $this->faker->text,
            ];
        }
    }
}
