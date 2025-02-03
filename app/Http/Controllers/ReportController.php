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
}