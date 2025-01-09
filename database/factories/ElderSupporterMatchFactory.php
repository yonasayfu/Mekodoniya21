<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ElderSupporterMatch;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ElderSupporterMatch>
 */
class ElderSupporterMatchFactory extends Factory
{
    protected $model = ElderSupporterMatch::class;

    public function definition()
    {
        return [
            'supporter_id' => \App\Models\Supporter::factory(),
            'elder_id' => \App\Models\Elder::factory(),
            'match_date' => $this->faker->date,
            'monthly_contribution_amount' => $this->faker->randomFloat(2, 10, 1000),
            'support_status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
