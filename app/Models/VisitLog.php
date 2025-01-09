<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitLog extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'elder_id', 'supporter_id', 'visit_date', 'visit_purpose', 'notes',
    ];

    // Relationships
    public function elder()
    {
        return $this->belongsTo(Elder::class);
    }

    public function supporter()
    {
        return $this->belongsTo(Supporter::class);
    }
}
