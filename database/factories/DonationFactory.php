<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Donation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    protected $model = Donation::class;

    public function definition()
    {
        return [
            'supporter_id' => \App\Models\Supporter::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'date' => $this->faker->date,
            'payment_method' => $this->faker->randomElement(['credit_card', 'bank_transfer', 'cash']),
            'donation_type' => $this->faker->randomElement(['monthly', 'one-time']),
        ];
    }
}
