<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonationAgreement;
use Inertia\Inertia;

class DonationAgreementController extends Controller
{
    // Display a list of donation agreements
    public function index()
    {
        $donationAgreements = DonationAgreement::with('supporter')->get();
        return Inertia::render('DonationAgreements/Index', ['donationAgreements' => $donationAgreements]);
    }

    // Show the form for creating a new donation agreement
    public function create()
    {
        return Inertia::render('DonationAgreements/Create');
    }

    // Store a newly created donation agreement in the database
    public function store(Request $request)
    {
        $request->validate([
            'supporter_id' => 'required|exists:supporters,id',
            'full_name' => 'required|string',
            'email_address' => 'required|email',
            'phone_number' => 'required|string',
            'monthly_donation_amount' => 'required|numeric',
            'bank_name' => 'required|string',
            'account_number' => 'required|string',
            'preferred_start_date' => 'required|date',
            'agreement_text' => 'nullable|string',
            'pdf_file' => 'nullable|string',
        ]);

        DonationAgreement::create($request->all());

        return redirect()->route('donation-agreements.index');
    }

    // Display the specified donation agreement
    public function show(DonationAgreement $donationAgreement)
    {
        return Inertia::render('DonationAgreements/Show', ['donationAgreement' => $donationAgreement]);
    }

    // Show the form for editing the specified donation agreement
    public function edit(DonationAgreement $donationAgreement)
    {
        return Inertia::render('DonationAgreements/Edit', ['donationAgreement' => $donationAgreement]);
    }

    // Update the specified donation agreement in the database
    public function update(Request $request, DonationAgreement $donationAgreement)
    {
        $request->validate([
            'supporter_id' => 'required|exists:supporters,id',
            'full_name' => 'required|string',
            'email_address' => 'required|email',
            'phone_number' => 'required|string',
            'monthly_donation_amount' => 'required|numeric',
            'bank_name' => 'required|string',
            'account_number' => 'required|string',
            'preferred_start_date' => 'required|date',
            'agreement_text' => 'nullable|string',
            'pdf_file' => 'nullable|string',
        ]);

        $donationAgreement->update($request->all());

        return redirect()->route('donation-agreements.index');
    }

    // Remove the specified donation agreement from the database
    public function destroy(DonationAgreement $donationAgreement)
    {
        $donationAgreement->delete();
        return redirect()->route('donation-agreements.index');
    }
}
