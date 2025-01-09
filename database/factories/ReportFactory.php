<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Report;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    protected $model = Report::class;

    public function definition()
    {
        return [
            'report_type' => $this->faker->randomElement(['elder', 'supporter', 'match', 'donation', 'visit']),
            'data' => json_encode(['key' => 'value']),
            'generated_at' => $this->faker->dateTime,
        ];
    }
}
