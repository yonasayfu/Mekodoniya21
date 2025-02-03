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

    // Display the specified staff member
    public function show(Staff $staff)
    {
        return Inertia::render('Staff/Show', ['staff' => $staff]);
    }
}