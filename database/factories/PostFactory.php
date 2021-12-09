<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title"=>$this->faker->realText(13),
            "content"=>$this->faker->realText(100),
            "description"=>$this->faker->realText(190),
            "category_id"=>$this->faker->randomDigitNotNull,
        ];
    }
}
