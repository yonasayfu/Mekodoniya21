<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DonationAgreement extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'supporter_id', 'full_name', 'email_address', 'phone_number', 'monthly_donation_amount',
        'bank_name', 'account_number', 'preferred_start_date', 'agreement_text', 'pdf_file',
    ];

    // Relationships
    public function supporter()
    {
        return $this->belongsTo(Supporter::class);
    }
}
