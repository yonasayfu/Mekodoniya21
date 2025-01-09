<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['wedding', 'birthday', 'memorial']),
            'date' => $this->faker->date,
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
            'location' => $this->faker->address,
            'facility_id' => \App\Models\Facility::factory(),
            'staff_id' => \App\Models\Staff::factory(),
            'catering_id' => \App\Models\Catering::factory(),
            'custom_requirements' => $this->faker->paragraph,
        ];
    }
}
