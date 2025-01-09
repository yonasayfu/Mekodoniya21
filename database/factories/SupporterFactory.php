<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Supporter;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supporter>
 */
class SupporterFactory extends Factory
{
    protected $model = Supporter::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(18, 80),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'support_type' => $this->faker->randomElement(['monthly', 'one-time']),
            'contribution_amount' => $this->faker->randomFloat(2, 10, 1000),
            'commit_duration' => $this->faker->numberBetween(1, 12),
            'start_date' => $this->faker->date,
            'bank_details' => $this->faker->paragraph,
            'visitation_preference' => $this->faker->randomElement(['yes', 'no', 'maybe']),
        ];
    }
}
