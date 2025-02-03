<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supporter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo_url',
        'age',
        'gender',
        'address',
        'phone_number',
        'email',
        'support_type',
        'contribution_amount',
        'commit_duration',
        'start_date',
        'bank_details',
        'visitation_preference',
    ];

    // Relationships
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function visitLogs()
    {
        return $this->hasMany(VisitLog::class);
    }

    public function elderSupporterMatches()
    {
        return $this->hasMany(ElderSupporterMatch::class);
    }

    public function donationAgreements()
    {
        return $this->hasMany(DonationAgreement::class);
    }

    public function testimonial()
    {
        return $this->hasOne(Testimonial::class);
    }
}
