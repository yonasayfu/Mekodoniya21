<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'supporter_id', 'amount', 'date', 'payment_method', 'donation_type',
    ];

    // Relationships
    public function supporter()
    {
        return $this->belongsTo(Supporter::class);
    }
}
