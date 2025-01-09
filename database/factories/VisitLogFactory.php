<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\VisitLog;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VisitLog>
 */
class VisitLogFactory extends Factory
{
    protected $model = VisitLog::class;

    public function definition()
    {
        return [
            'elder_id' => \App\Models\Elder::factory(),
            'supporter_id' => \App\Models\Supporter::factory(),
            'visit_date' => $this->faker->date,
            'visit_purpose' => $this->faker->paragraph,
            'notes' => $this->faker->paragraph,
        ];
    }
}
