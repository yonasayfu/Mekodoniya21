<?php

namespace Database\Factories;

use App\Models\Donation;
use App\Models\Supporter; // Import the Supporter model
use Illuminate\Support\Facades\Log; // Import the Log facade
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    public function definition(): array
    {
        // 1. Get a random *existing* supporter ID (preferred method for seeding)
        $supporter = Supporter::inRandomOrder()->first();

        // 2. Handle the case where no supporters exist (essential!)
        if (!$supporter) {
            Log::error("No supporters found in the database.  Run SupporterSeeder first.");
            // Option A: Create a default supporter (for development)
            // $supporter = Supporter::factory()->create();
            // Option B: Throw an exception to stop seeding
            throw new \Exception("No supporters found.  Run SupporterSeeder before DonationSeeder.");
        }


        return [
            'supporter_id' => $supporter->id,  // Use the *existing* supporter's ID
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'date' => $this->faker->dateTimeBetween('2025-01-01', '2025-12-31'),
            'total_needed' => $this->faker->optional()->randomFloat(2, 1000, 10000),
        ];
    }
}