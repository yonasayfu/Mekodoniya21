<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Catering;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catering>
 */
class CateringFactory extends Factory
{
    protected $model = Catering::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'menu' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
