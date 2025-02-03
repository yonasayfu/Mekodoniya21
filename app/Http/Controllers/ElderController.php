<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Elder;
// use Inertia\Inertia;

// class ElderController extends Controller
// {
//     // Display a list of elders
//     public function index()
//     {
//         $elders = Elder::all();
//         return Inertia::render('Elders/Index', ['elders' => $elders]);
//     }

//     // Display the specified elder
//     public function show(Elder $elder)
//     {
//         return Inertia::render('Elders/Show', ['elder' => $elder]);
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Elder;
use Inertia\Inertia;

class ElderController extends Controller
{
    public function index(Request $request)
    {
        // Get filter parameters from the request
        $filters = $request->only(['age', 'gender', 'support_status', 'current_needs']);

        // Build the query based on filters
        $elders = Elder::query()
            ->when($filters['age'] ?? null, function ($query, $age) {
                $query->where('age', '>=', $age); // Filter by minimum age
            })
            ->when($filters['gender'] ?? null, function ($query, $gender) {
                $query->where('gender', $gender); // Filter by gender
            })
            ->when($filters['support_status'] ?? null, function ($query, $supportStatus) {
                $query->where('support_status', $supportStatus); // Filter by support status
            })
            ->when($filters['current_needs'] ?? null, function ($query, $currentNeeds) {
                $query->where('current_needs', 'like', '%' . $currentNeeds . '%'); // Filter by current needs
            })
            ->get();

        // Pass the elders and filters to the frontend
        return Inertia::render('Elders/Index', [
            'elders' => $elders,
            'filters' => $filters, // Pass filters back to the frontend for UI consistency
        ]);
    }

    // Display the details of a specific elder
    public function show(Elder $elder)
    {
        // Load the elder's photos
        $elder->load('photos');

        return Inertia::render('Elders/Show', [
            'elder' => $elder,
        ]);
    }
}