<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DonationController extends Controller
{

    
    public function index(Request $request)
    {
        
    $year = $request->input('year', now()->year);       // Get year from request or default to current year
    $month = $request->input('month', now()->month);     // Get month from request or default to current month
    $quarter = ceil($month / 3); // Calculate the quarter
    $halfYear = ceil($month / 6); // Calculate the half-year


    $monthlyTotal = Donation::totalForMonth($year, $month);
    $quarterlyTotal = Donation::totalForQuarter($year, $quarter);
    $halfYearlyTotal = Donation::totalForHalfYear($year, $halfYear);
    $yearlyTotal = Donation::totalForYear($year);
    $monthlyTotal = (float) $monthlyTotal;
    $quarterlyTotal = (float) $quarterlyTotal;
    $halfYearlyTotal = (float) $halfYearlyTotal;
    $yearlyTotal = (float) $yearlyTotal;
    
    return Inertia::render('Donations/Index', [
        'monthlyTotal' => $monthlyTotal,
    'quarterlyTotal' => $quarterlyTotal,
    'halfYearlyTotal' => $halfYearlyTotal,
    'yearlyTotal' => $yearlyTotal,
    'year' => (int) $year,  // Cast to integer
    'month' => (int) $month, // Cast to integer
    ]);
    
    
        $year = $request->input('year', now()->year);       // Get year from request or default to current year
        $month = $request->input('month', now()->month);     // Get month from request or default to current month
        $quarter = ceil($month / 3); // Calculate the quarter
        $halfYear = ceil($month / 6); // Calculate the half-year


        $monthlyTotal = Donation::totalForMonth($year, $month);
        $quarterlyTotal = Donation::totalForQuarter($year, $quarter);
        $halfYearlyTotal = Donation::totalForHalfYear($year, $halfYear);
        $yearlyTotal = Donation::totalForYear($year);

        
        return Inertia::render('Donations/Index', [
            'monthlyTotal' => $monthlyTotal,
            'quarterlyTotal' => $quarterlyTotal,
            'halfYearlyTotal' => $halfYearlyTotal,
            'yearlyTotal' => $yearlyTotal,
            'year' => $year,
            'month' => $month,
        ]);
    }

    // ... other controller methods
}