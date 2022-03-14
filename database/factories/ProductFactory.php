<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            ],
            'descripton' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit, natus magnam non molestias eos iste accusantium sed porro sit impedit expedita possimus ullam magni assumenda ut minima laudantium odio neque.',
            'purchasing_price' => (float)random_int(1 , 100),
            'selling_price' => (float)random_int(1 , 100),
            'vat' => (float)random_int(1 , 100),
            'wholesale_price' => (float)random_int(1 , 100),
            'quantity' => random_int(1 , 50),
            'category_id' => random_int(9 , 11),
            'sub_category_id' => random_int(17 , 20),  
        ];
    }
}
