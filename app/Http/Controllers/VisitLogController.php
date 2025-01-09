<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitLog;
use Inertia\Inertia;

class VisitLogController extends Controller
{
    // Display a list of visit logs
    public function index()
    {
        $visitLogs = VisitLog::with(['elder', 'supporter'])->get();
        return Inertia::render('VisitLogs/Index', ['visitLogs' => $visitLogs]);
    }

    // Show the form for creating a new visit log
    public function create()
    {
        return Inertia::render('VisitLogs/Create');
    }

    // Store a newly created visit log in the database
    public function store(Request $request)
    {
        $request->validate([
            'elder_id' => 'required|exists:elders,id',
            'supporter_id' => 'required|exists:supporters,id',
            'visit_date' => 'required|date',
            'visit_purpose' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        VisitLog::create($request->all());

        return redirect()->route('visit-logs.index');
    }

    // Display the specified visit log
    public function show(VisitLog $visitLog)
    {
        return Inertia::render('VisitLogs/Show', ['visitLog' => $visitLog]);
    }

    // Show the form for editing the specified visit log
    public function edit(VisitLog $visitLog)
    {
        return Inertia::render('VisitLogs/Edit', ['visitLog' => $visitLog]);
    }

    // Update the specified visit log in the database
    public function update(Request $request, VisitLog $visitLog)
    {
        $request->validate([
            'elder_id' => 'required|exists:elders,id',
            'supporter_id' => 'required|exists:supporters,id',
            'visit_date' => 'required|date',
            'visit_purpose' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $visitLog->update($request->all());

        return redirect()->route('visit-logs.index');
    }

    // Remove the specified visit log from the database
    public function destroy(VisitLog $visitLog)
    {
        $visitLog->delete();
        return redirect()->route('visit-logs.index');
    }
}
