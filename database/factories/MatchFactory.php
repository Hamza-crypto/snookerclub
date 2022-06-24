<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // generate random number in ange
        $random = rand(1,10);
        return [
            'player_1' => $random,
            'player_2' => $random - 1,
            'year' => $this->faker->year(),
            'tournament' => $this->faker->sentence,
            'rules' => implode(',', $this->faker->words(3)),
            'round' => $random + rand(1,10),
            'winner' => $random,
            'result' => $random + rand(1,10)
        ];
    }
}
