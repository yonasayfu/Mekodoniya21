<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Staff;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    protected $model = Staff::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'role' => $this->faker->jobTitle,
            'schedule' => $this->faker->paragraph,
            'contact_information' => $this->faker->phoneNumber,
        ];
    }
}
