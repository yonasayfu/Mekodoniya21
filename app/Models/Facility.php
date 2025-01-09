<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name', 'location', 'capacity', 'availability',
    ];

    // Relationships
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
