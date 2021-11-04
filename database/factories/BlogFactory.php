<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
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
            'isi' => $this->faker->paragraph,
            'tanggal' => $this->faker->date,
            'user_id' => User::factory(),
            'blog_category_id' => BlogCategory::factory()
        ];
    }
}
