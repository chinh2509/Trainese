<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @param $faker
     * @return array
     */
    public function definition($faker)
    {
        return [
            'name' => $faker->name,
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'email' => $faker->unique()->safeEmail,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
