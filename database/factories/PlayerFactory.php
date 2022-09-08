<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;


class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'dob' => $this->faker->dateTimeBetween('-40 years', '-18 years'),
            'birth_place' => $this->faker->country,
            'residence' => $this->faker->country,
            'plays_with' => ['Right-handed', 'Left-handed'][rand(0, 1)],
            'professional_since' => $this->faker->year(),
            'highest_break' => rand(5, 10),
            'win' => $this->faker->numberBetween(1, 10) ,
            'lost' => $this->faker->numberBetween(1, 10) ,
            'titles' =>  $this->faker->word,
            'earnings' => $this->faker->numberBetween(5000, 10000),
            'image1' => $this->faker->imageUrl(),
            'image2' => $this->faker->imageUrl(),
        ];
    }


}
