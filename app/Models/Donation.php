<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = ['supporter_id', 'amount', 'date', 'total_needed'];

    protected $casts = [
        'date' => 'date', // Important: Cast 'date' to a Date object
    ];

    public function supporter()
    {
        return $this->belongsTo(Supporter::class);
    }

    public function scopeForPeriod($query, $startDate, $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    public static function totalForPeriod($startDate, $endDate)
    {
        return self::forPeriod($startDate, $endDate)->sum('amount');
    }

    public static function totalForMonth($year, $month)
    {
        $startDate = Carbon::create($year, $month, 1)->startOfMonth();
        $endDate = Carbon::create($year, $month, 1)->endOfMonth();
        return self::totalForPeriod($startDate, $endDate);
    }

    public static function totalForQuarter($year, $quarter)
    {
        $startDate = Carbon::createFromDate($year, ($quarter - 1) * 3 + 1, 1)->startOfQuarter();
        $endDate = Carbon::createFromDate($year, ($quarter - 1) * 3 + 1, 1)->endOfQuarter();
        return self::totalForPeriod($startDate, $endDate);
    }

    // public static function totalForHalfYear($year, $halfYear)
    // {
    //     $startDate = Carbon::createFromDate($year, ($halfYear - 1) * 6 + 1, 1)->startOfHalfYear();
    //     $endDate = Carbon::createFromDate($year, ($halfYear - 1) * 6 + 1, 1)->endOfHalfYear();
    //     return self::totalForPeriod($startDate, $endDate);
    // }

    public static function totalForHalfYear($year, $halfYear)
    {
        $startMonth = ($halfYear - 1) * 6 + 1;
        $endMonth = $halfYear * 6;

        $startDate = Carbon::createFromDate($year, $startMonth, 1)->startOfMonth();
        $endDate = Carbon::createFromDate($year, $endMonth, 1)->endOfMonth();

        return self::totalForPeriod($startDate, $endDate);
    }

    public static function totalForYear($year)
    {
        $startDate = Carbon::createFromDate($year, 1, 1)->startOfYear();
        $endDate = Carbon::createFromDate($year, 1, 1)->endOfYear();
        return self::totalForPeriod($startDate, $endDate);
    }
}
