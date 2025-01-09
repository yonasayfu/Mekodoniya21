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

    // Show the form for creating a new facility
    public function create()
    {
        return Inertia::render('Facilities/Create');
    }

    // Store a newly created facility in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'capacity' => 'required|integer',
            'availability' => 'required|boolean',
        ]);

        Facility::create($request->all());

        return redirect()->route('facilities.index');
    }

    // Display the specified facility
    public function show(Facility $facility)
    {
        return Inertia::render('Facilities/Show', ['facility' => $facility]);
    }

    // Show the form for editing the specified facility
    public function edit(Facility $facility)
    {
        return Inertia::render('Facilities/Edit', ['facility' => $facility]);
    }

    // Update the specified facility in the database
    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'capacity' => 'required|integer',
            'availability' => 'required|boolean',
        ]);

        $facility->update($request->all());

        return redirect()->route('facilities.index');
    }

    // Remove the specified facility from the database
    public function destroy(Facility $facility)
    {
        $facility->delete();
        return redirect()->route('facilities.index');
    }
}
