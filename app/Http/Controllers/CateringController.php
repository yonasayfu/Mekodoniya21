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

    // Show the form for creating a new catering
    public function create()
    {
        return Inertia::render('Caterings/Create');
    }

    // Store a newly created catering in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'menu' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Catering::create($request->all());

        return redirect()->route('caterings.index');
    }

    // Display the specified catering
    public function show(Catering $catering)
    {
        return Inertia::render('Caterings/Show', ['catering' => $catering]);
    }

    // Show the form for editing the specified catering
    public function edit(Catering $catering)
    {
        return Inertia::render('Caterings/Edit', ['catering' => $catering]);
    }

    // Update the specified catering in the database
    public function update(Request $request, Catering $catering)
    {
        $request->validate([
            'name' => 'required|string',
            'menu' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $catering->update($request->all());

        return redirect()->route('caterings.index');
    }

    // Remove the specified catering from the database
    public function destroy(Catering $catering)
    {
        $catering->delete();
        return redirect()->route('caterings.index');
    }
}
