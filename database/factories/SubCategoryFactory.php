<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => [
                'en' => 'En-'.$this->faker->name(),
                'ar' => 'Ar-'.$this->faker->name(),
            ]

        ];
    }
}
