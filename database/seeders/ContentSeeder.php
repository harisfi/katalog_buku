<?php

namespace Database\Seeders;

use App\Models\Content;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $defaultContent = [
            [
                'judul' => 'Selamat Datang!',
                'isi' => $faker->paragraph,
                'tanggal' => $faker->date
            ],
            [
                'judul' => 'About Us',
                'isi' => $faker->paragraph,
                'tanggal' => $faker->date
            ],
        ];

        foreach ($defaultContent as $d) {
            Content::create($d);
        }
        Content::factory()->count(5)->create();
    }
}
