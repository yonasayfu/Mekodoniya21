<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'category',
        'date',
        'start_time',
        'end_time',
        'location',
        'facility_id',
        'staff_id',
        'catering_id',
        'custom_requirements',
        'image_url',
        'status',
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
    public function photos()
    {
        return $this->morphMany(PhotoGallery::class, 'imageable');
    }
}
