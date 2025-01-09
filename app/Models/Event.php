<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'date', 'start_time', 'end_time', 'location', 'facility_id',
        'staff_id', 'catering_id', 'custom_requirements',
    ];

    // Relationships
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function catering()
    {
        return $this->belongsTo(Catering::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function photoGalleries()
    {
        return $this->hasMany(PhotoGallery::class);
    }
}
