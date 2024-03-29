<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Race>
 */
class RaceResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'race_id' => 1,
            'laptime' => $this->faker->time('i:s', strtotime('1:00'), strtotime('4:59')) . ':' . (string)random_int(0,9) . (string)random_int(0,9) . (string)random_int(0,9),
        ];
    }
}
