<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Invoice;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'event_id' => \App\Models\Event::factory(),
            'amount' => $this->faker->randomFloat(2, 100, 10000),
            'date' => $this->faker->date,
            'status' => $this->faker->randomElement(['paid', 'unpaid', 'pending']),
        ];
    }
}
