<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kategori_buku' => $this->faker->unique()->word
        ];
    }
}
