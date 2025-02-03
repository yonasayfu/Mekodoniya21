<?php

namespace App\Http\Controllers;

use App\Models\DonationAgreement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

// Use for generating PDF

class DonationAgreementController extends Controller
{
    /**
     * Display the support options page.
     */
    public function index()
    {
        return Inertia::render('DonationAgreements/SupportOptions');
    }

    /**
     * Store a newly created donation agreement in storage.
     */
    // use Barryvdh\DomPDF\Facade\Pdf;

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'supporter_id' => 'required|exists:supporters,id',
            'full_name' => 'required|string|max:255',
            'email_address' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'donation_type' => 'required|string|in:one-time,recurring',
            'donation_amount' => 'required|numeric|min:0',
            'recurring_interval' => 'nullable|string|in:monthly,quarterly,half-yearly,yearly',
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
            'terms_and_conditions' => 'required|boolean',
            'additional_comments' => 'nullable|string|max:255',
            'signed_agreement_pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $filePaths = [];
        foreach (['signed_agreement_pdf'] as $fileField) {
            if ($request->hasFile($fileField)) {
                $file = $request->file($fileField);
                $path = $file->store('donation_agreements');
                //dd(Storage::path($path));
                $filePaths[$fileField] = $path;
            }
        }

        $donationAgreement = DonationAgreement::create([
            'supporter_id' => $request->input('supporter_id'),
            'full_name' => $request->input('full_name'),
            'email_address' => $request->input('email_address'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'donation_type' => $request->input('donation_type'),
            'donation_amount' => $request->input('donation_amount'),
            'recurring_interval' => $request->input('recurring_interval'),
            'bank_name' => $request->input('bank_name'),
            'account_number' => $request->input('account_number'),
            'account_holder_name' => $request->input('account_holder_name'),
            'agreement_text' => $request->input('agreement_text'),
            'terms_and_conditions' => $request->input('terms_and_conditions'),
            'additional_comments' => $request->input('additional_comments'),
            'signed_agreement_pdf' => $filePaths['signed_agreement_pdf'] ?? null,
            'public_profile' => $request->has('public_profile'),
        ]);

        // Use correct path to the Blade view
        
        $pdf = Pdf::loadView('pdf.summary', ['donationAgreement' => $donationAgreement]);
        $pdfPath = 'summaries/' . $donationAgreement->id . '_summary.pdf';
        Storage::put($pdfPath, $pdf->output());

        $donationAgreement->update(['summary_pdf' => $pdfPath]);

        return redirect()->route('donation-agreements.index')->with('success', 'Donation agreement created successfully.');

    }

    /**
     * Show the form for creating a new donation agreement.
     */
    public function create()
    {
        return Inertia::render('DonationAgreements/DonationForm');
    }

    // ... other resource methods (edit, update, destroy)
}
