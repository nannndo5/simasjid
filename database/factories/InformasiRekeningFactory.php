<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InformasiRekening>
 */
class InformasiRekeningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gambar' => null,
            'nama_bank_1' => fake()->randomElement(['BCA', 'BNI', 'BRI', 'Mandiri', 'BSI']),
            'no_rekening_1' => fake()->numerify('##########'),
            'nama_bank_2' => fake()->randomElement(['BCA', 'BNI', 'BRI', 'Mandiri', 'BSI']),
            'no_rekening_2' => fake()->numerify('##########'),
            'nama_bank_3' => fake()->randomElement(['BCA', 'BNI', 'BRI', 'Mandiri', 'BSI']),
            'no_rekening_3' => fake()->numerify('##########'),
            'no_whatsapp' => fake()->numerify('08##########'),
            'is_active' => true,
        ];
    }
}
