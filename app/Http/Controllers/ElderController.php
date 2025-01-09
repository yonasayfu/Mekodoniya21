<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Elder;
use Inertia\Inertia;

class ElderController extends Controller
{
    // Display a list of elders
    public function index()
    {
        $elders = Elder::all();
        return Inertia::render('Elders/Index', ['elders' => $elders]);
    }

    // Show the form for creating a new elder
    public function create()
    {
        return Inertia::render('Elders/Create');
    }

    // Store a newly created elder in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'background_story' => 'nullable|string',
            'current_needs' => 'nullable|string',
            'medical_history' => 'nullable|string',
            'support_status' => 'nullable|string',
        ]);

        Elder::create($request->all());

        return redirect()->route('elders.index');
    }

    // Display the specified elder
    public function show(Elder $elder)
    {
        return Inertia::render('Elders/Show', ['elder' => $elder]);
    }

    // Show the form for editing the specified elder
    public function edit(Elder $elder)
    {
        return Inertia::render('Elders/Edit', ['elder' => $elder]);
    }

    // Update the specified elder in the database
    public function update(Request $request, Elder $elder)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'background_story' => 'nullable|string',
            'current_needs' => 'nullable|string',
            'medical_history' => 'nullable|string',
            'support_status' => 'nullable|string',
        ]);

        $elder->update($request->all());

        return redirect()->route('elders.index');
    }

    // Remove the specified elder from the database
    public function destroy(Elder $elder)
    {
        $elder->delete();
        return redirect()->route('elders.index');
    }
}
