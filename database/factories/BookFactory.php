<?php

namespace Database\Factories;

use App\Models\BookCategory;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence,
            'pengarang' => $this->faker->name,
            'tahun_terbit' => $this->faker->year,
            'sinopsis' => $this->faker->paragraph,
            'cover' => $this->faker->image,
            'publisher_id' => Publisher::factory(),
            'book_category_id' => BookCategory::factory()
        ];
    }
}
