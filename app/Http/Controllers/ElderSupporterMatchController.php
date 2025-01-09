<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ElderSupporterMatch;
use Inertia\Inertia;

class ElderSupporterMatchController extends Controller
{
    // Display a list of matches
    public function index()
    {
        $matches = ElderSupporterMatch::with(['elder', 'supporter'])->get();
        return Inertia::render('ElderSupporterMatches/Index', ['matches' => $matches]);
    }

    // Show the form for creating a new match
    public function create()
    {
        return Inertia::render('ElderSupporterMatches/Create');
    }

    // Store a newly created match in the database
    public function store(Request $request)
    {
        $request->validate([
            'supporter_id' => 'required|exists:supporters,id',
            'elder_id' => 'required|exists:elders,id',
            'match_date' => 'required|date',
            'monthly_contribution_amount' => 'required|numeric',
            'support_status' => 'required|string',
        ]);

        ElderSupporterMatch::create($request->all());

        return redirect()->route('elder-supporter-matches.index');
    }

    // Display the specified match
    public function show(ElderSupporterMatch $match)
    {
        return Inertia::render('ElderSupporterMatches/Show', ['match' => $match]);
    }

    // Show the form for editing the specified match
    public function edit(ElderSupporterMatch $match)
    {
        return Inertia::render('ElderSupporterMatches/Edit', ['match' => $match]);
    }

    // Update the specified match in the database
    public function update(Request $request, ElderSupporterMatch $match)
    {
        $request->validate([
            'supporter_id' => 'required|exists:supporters,id',
            'elder_id' => 'required|exists:elders,id',
            'match_date' => 'required|date',
            'monthly_contribution_amount' => 'required|numeric',
            'support_status' => 'required|string',
        ]);

        $match->update($request->all());

        return redirect()->route('elder-supporter-matches.index');
    }

    // Remove the specified match from the database
    public function destroy(ElderSupporterMatch $match)
    {
        $match->delete();
        return redirect()->route('elder-supporter-matches.index');
    }
}
