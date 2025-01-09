<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'event_id', 'amount', 'date', 'status',
    ];

    // Relationships
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
