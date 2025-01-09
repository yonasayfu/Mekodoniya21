<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Catering extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name', 'menu', 'price',
    ];

    // Relationships
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
