<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Inertia\Inertia;

class ReportController extends Controller
{
    // Display a list of reports
    public function index()
    {
        $reports = Report::all();
        return Inertia::render('Reports/Index', ['reports' => $reports]);
    }

    // Show the form for creating a new report
    public function create()
    {
        return Inertia::render('Reports/Create');
    }

    // Store a newly created report in the database
    public function store(Request $request)
    {
        $request->validate([
            'report_type' => 'required|string',
            'data' => 'nullable|json',
            'generated_at' => 'nullable|date',
        ]);

        Report::create($request->all());

        return redirect()->route('reports.index');
    }

    // Display the specified report
    public function show(Report $report)
    {
        return Inertia::render('Reports/Show', ['report' => $report]);
    }

    // Show the form for editing the specified report
    public function edit(Report $report)
    {
        return Inertia::render('Reports/Edit', ['report' => $report]);
    }

    // Update the specified report in the database
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'report_type' => 'required|string',
            'data' => 'nullable|json',
            'generated_at' => 'nullable|date',
        ]);

        $report->update($request->all());

        return redirect()->route('reports.index');
    }

    // Remove the specified report from the database
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index');
    }
}
