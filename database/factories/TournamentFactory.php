<?php

namespace Database\Factories;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentFactory extends Factory
{
    protected $model = Tournament::class;

    public function definition()
    {
        // generate random number in ange
        $random = rand(1,10);

        $player_1 = $random;
        $player_2 = $player_1 - 1 == 0 ? $player_1 + 2 : $player_1 - 1;

        return [
            'player_1' => $player_1,
            'player_2' => $player_2,
            'year' => $this->faker->year(),
            'tournament' => $this->faker->sentence,
            'rules' => implode(',', $this->faker->words(3)),
            'rounds' => $random + rand(1,10),
            'winner' => [$player_1, $player_2][rand(0,1)],
            'result' => $random + rand(1,10)
        ];
    }
}
