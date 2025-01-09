<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Elder extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name', 'age', 'gender', 'date_of_birth', 'address', 'phone_number', 'email',
        'background_story', 'current_needs', 'medical_history', 'support_status',
    ];

    // Relationships
    public function visitLogs()
    {
        return $this->hasMany(VisitLog::class);
    }

    public function elderSupporterMatches()
    {
        return $this->hasMany(ElderSupporterMatch::class);
    }
}
