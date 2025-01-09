<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Inertia\Inertia;

class DonationController extends Controller
{
    // Display a list of donations
    public function index()
    {
        $donations = Donation::with('supporter')->get();
        return Inertia::render('Donations/Index', ['donations' => $donations]);
    }

    // Show the form for creating a new donation
    public function create()
    {
        return Inertia::render('Donations/Create');
    }

    // Store a newly created donation in the database
    public function store(Request $request)
    {
        $request->validate([
            'supporter_id' => 'required|exists:supporters,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'payment_method' => 'required|string',
            'donation_type' => 'required|string',
        ]);

        Donation::create($request->all());

        return redirect()->route('donations.index');
    }

    // Display the specified donation
    public function show(Donation $donation)
    {
        return Inertia::render('Donations/Show', ['donation' => $donation]);
    }

    // Show the form for editing the specified donation
    public function edit(Donation $donation)
    {
        return Inertia::render('Donations/Edit', ['donation' => $donation]);
    }

    // Update the specified donation in the database
    public function update(Request $request, Donation $donation)
    {
        $request->validate([
            'supporter_id' => 'required|exists:supporters,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'payment_method' => 'required|string',
            'donation_type' => 'required|string',
        ]);

        $donation->update($request->all());

        return redirect()->route('donations.index');
    }

    // Remove the specified donation from the database
    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('donations.index');
    }
}
