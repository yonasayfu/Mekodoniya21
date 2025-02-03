<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catering;
use Inertia\Inertia;

class CateringController extends Controller
{
    // Display a list of caterings
    public function index()
    {
        $caterings = Catering::all();
        return Inertia::render('Caterings/Index', ['caterings' => $caterings]);
    }

    // Display the specified catering
    public function show(Catering $catering)
    {
        return Inertia::render('Caterings/Show', ['catering' => $catering]);
    }
}