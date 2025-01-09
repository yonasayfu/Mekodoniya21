<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Inertia\Inertia;

class StaffController extends Controller
{
    // Display a list of staff
    public function index()
    {
        $staff = Staff::all();
        return Inertia::render('Staff/Index', ['staff' => $staff]);
    }

    // Show the form for creating a new staff member
    public function create()
    {
        return Inertia::render('Staff/Create');
    }

    // Store a newly created staff member in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'schedule' => 'required|string',
            'contact_information' => 'required|string',
        ]);

        Staff::create($request->all());

        return redirect()->route('staff.index');
    }

    // Display the specified staff member
    public function show(Staff $staff)
    {
        return Inertia::render('Staff/Show', ['staff' => $staff]);
    }

    // Show the form for editing the specified staff member
    public function edit(Staff $staff)
    {
        return Inertia::render('Staff/Edit', ['staff' => $staff]);
    }

    // Update the specified staff member in the database
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'schedule' => 'required|string',
            'contact_information' => 'required|string',
        ]);

        $staff->update($request->all());

        return redirect()->route('staff.index');
    }

    // Remove the specified staff member from the database
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index');
    }
}
