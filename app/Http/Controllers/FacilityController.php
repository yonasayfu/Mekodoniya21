<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use Inertia\Inertia;

class FacilityController extends Controller
{
    // Display a list of facilities
    public function index()
    {
        $facilities = Facility::all();
        return Inertia::render('Facilities/Index', ['facilities' => $facilities]);
    }

    // Display the specified facility
    public function show(Facility $facility)
    {
        return Inertia::render('Facilities/Show', ['facility' => $facility]);
    }
}