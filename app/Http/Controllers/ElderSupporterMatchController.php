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

    // Display the specified match
    public function show(ElderSupporterMatch $match)
    {
        return Inertia::render('ElderSupporterMatches/Show', ['match' => $match]);
    }
}