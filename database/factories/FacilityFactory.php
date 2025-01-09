<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Facility;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facility>
 */
class FacilityFactory extends Factory
{
    protected $model = Facility::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'location' => $this->faker->address,
            'capacity' => $this->faker->numberBetween(50, 500),
            'availability' => $this->faker->boolean,
        ];
    }
}
