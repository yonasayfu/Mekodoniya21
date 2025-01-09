<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name', 'role', 'schedule', 'contact_information',
    ];

    // Relationships
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
