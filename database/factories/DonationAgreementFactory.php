<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DonationAgreement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonationAgreement>
 */
class DonationAgreementFactory extends Factory
{
    protected $model = DonationAgreement::class;

    public function definition()
    {
        return [
            'supporter_id' => \App\Models\Supporter::factory(),
            'full_name' => $this->faker->name,
            'email_address' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'monthly_donation_amount' => $this->faker->randomFloat(2, 10, 1000),
            'bank_name' => $this->faker->word,
            'account_number' => $this->faker->bankAccountNumber,
            'preferred_start_date' => $this->faker->date,
            'agreement_text' => $this->faker->paragraph,
            'pdf_file' => $this->faker->optional()->filePath(),
        ];
    }
}
