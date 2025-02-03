<?php
namespace App\Http\Controllers;

use App\Models\Supporter;
use Inertia\Inertia;

class SupporterController extends Controller
{
    public function index()
    {
        $supporters = Supporter::query()
            ->whereHas('donationAgreements', fn($q) => $q->where('public_profile', false))
            ->with(['elderSupporterMatches.elder', 'donationAgreements', 'testimonial'])
            ->get()
            ->shuffle(); // Randomize display order

        return Inertia::render('Supporters/Index', [
            'supporters' => $supporters->map(function ($supporter) {
                return [
                    'id' => $supporter->id,
                    'name' => $supporter->name,
                    'photo_url' => $supporter->photo_url, // Ensure this field is correctly set
                    'contribution' => $supporter->donationAgreements->sum('monthly_donation_amount'),
                    'support_type' => $supporter->support_type,
                    'visitations_reference' => $supporter->visitations_reference,
                    'elders' => $supporter->elderSupporterMatches->map(fn($m) => [
                        'name' => $m->elder->name,
                        'photo' => $m->elder->photo_url,
                    ]),
                    'testimonial' => $supporter->testimonial->content ?? null,
                ];
            }),
        ]);
    }

    public function show(Supporter $supporter)
    {
        $supporter->load(['donations', 'visitLogs', 'elderSupporterMatches', 'donationAgreements']);
        return Inertia::render('Supporters/Show', ['supporter' => $supporter]);
    }
}
