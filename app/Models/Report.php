<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'report_type', 'data', 'generated_at',
    ];
}
