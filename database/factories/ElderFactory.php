<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Elder;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Elder>
 */
class ElderFactory extends Factory
{
    protected $model = Elder::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(60, 100),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'date_of_birth' => $this->faker->date,
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'background_story' => $this->faker->paragraph,
            'current_needs' => $this->faker->paragraph,
            'medical_history' => $this->faker->paragraph,
            'support_status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
