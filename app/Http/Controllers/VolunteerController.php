<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;
use Inertia\Inertia;

class VolunteerController extends Controller
{
    // Show the form for creating a new volunteer
    public function create()
    {
        return Inertia::render('Volunteers/Create');
    }

    // Store a newly created volunteer in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'skills' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        Volunteer::create($request->all());

        return redirect()->route('volunteers.show', Volunteer::latest()->first());
    }

    // Display a list of volunteers
    public function index()
    {
        $volunteers = Volunteer::all();
        return Inertia::render('Volunteers/Index', ['volunteers' => $volunteers]);
    }
}