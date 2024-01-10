<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mobil>
 */
class MobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'no_plat' => $this->faker->unique()->regexify('[A-Z]{1,3}[0-9]{1,4}'),
            'merk' => $this->faker->text(20),
            'warna' => $this->faker->colorName,
            'tahun' => $this->faker->year,
            'harga_sewa' => $this->faker->numberBetween(100000, 1000000),
            'gambar' => $this->faker->imageUrl(640, 480, 'car', true),
            'status' => $this->faker->randomElement(['Tersedia', 'Dipesan', 'Disewa']),
            'id_kategori' => $this->faker->uuid,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
