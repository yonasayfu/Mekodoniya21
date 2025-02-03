<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'age', 'gender', 'date_of_birth', 'address', 'phone_number', 'email',
        'background_story', 'current_needs', 'medical_history', 'support_status', 'photo_url',
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

    public function photos()
    {
        return $this->morphMany(PhotoGallery::class, 'imageable');
    }
}
