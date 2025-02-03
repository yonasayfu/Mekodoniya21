<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationAgreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'supporter_id',
        'full_name',
        'email_address',
        'phone_number',
        'address',
        'donation_type',
        'donation_amount',
        'recurring_interval',
        'bank_name',
        'account_number',
        'account_holder_name',
        'agreement_text',
        'terms_and_conditions',
        'additional_comments',
        'signed_agreement_pdf',
        'bank_form_pdf',
        'public_profile',
        'summary_pdf', // Added this field
    ];

    // Relationships
    public function supporter()
    {
        return $this->belongsTo(Supporter::class);
    }
}
