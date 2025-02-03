<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ElderSupporterMatch extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'supporter_id', 'elder_id', 'match_date', 'monthly_contribution_amount', 'support_status',
    ];

    // Relationships
    public function supporter()
    {
        return $this->belongsTo(Supporter::class);
    }

    public function elder()
    {
        return $this->belongsTo(Elder::class);
    }
    
}
