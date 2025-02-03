<?php

namespace Database\Factories;

use App\Models\DonationAgreement;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationAgreementFactory extends Factory
{
    protected $model = DonationAgreement::class;

    public function definition()
    {
        return [
            'supporter_id' => \App\Models\Supporter::factory(),
            'full_name' => $this->faker->name,
            'email_address' => $this->faker->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'donation_type' => $this->faker->randomElement(['one-time', 'recurring']),
            'donation_amount' => $this->faker->randomFloat(2, 10, 1000),
            'recurring_interval' => $this->faker->randomElement(['monthly', 'quarterly', 'half-yearly', 'yearly']),
            'bank_name' => $this->faker->company,
            'account_number' => $this->faker->bankAccountNumber,
            'account_holder_name' => $this->faker->name,
            'agreement_text' => $this->faker->paragraph,
            'terms_and_conditions' => true,
            'additional_comments' => $this->faker->sentence,
            'signed_agreement_pdf' => null,
            'bank_form_pdf' => null,
            'summary_pdf' => null, // Added this field
            'public_profile' => $this->faker->boolean,
        ];
    }
}
