<?php

namespace Database\Seeders;

use App\Models\DonationAgreement;
use Illuminate\Database\Seeder;

class DonationAgreementSeeder extends Seeder
{
    public function run(): void
    {
        DonationAgreement::factory()->count(10)->create();

        // Example with specific values (adapt as needed)
        DonationAgreement::create([
            'supporter_id' => 1, // Make sure supporter with id 1 exists
            'full_name' => 'John Doe',
            'email_address' => 'john.doe@example.com',
            'phone_number' => '123-456-7890',
            'address' => '123 Main St, Anytown',
            'donation_type' => 'recurring',
            'donation_amount' => 100.00,
            'recurring_interval' => 'monthly',
            'bank_name' => 'Bank of Example',
            'account_number' => '1234567890',
            'account_holder_name' => 'John Doe',
            'agreement_text' => 'Sample agreement text.',
            'terms_and_conditions' => true,
            'additional_comments' => 'Some extra info.',
            'original_agreement_pdf' => 'path/to/original.pdf', // Replace with actual paths or null
            'signed_agreement_pdf' => 'path/to/signed.pdf', // Replace with actual paths or null
            'bank_form_pdf' => 'path/to/bankform.pdf', // Replace with actual paths or null
            'public_profile' => true,
        ]);
    }
}
