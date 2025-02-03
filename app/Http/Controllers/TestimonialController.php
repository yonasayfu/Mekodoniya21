<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Inertia\Inertia;

class TestimonialController extends Controller
{
    // Show the form for creating a new testimonial
    public function create()
    {
        return Inertia::render('Testimonials/Create');
    }

    // Store a newly created testimonial in the database
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'author_name' => 'required|string',
            'author_role' => 'nullable|string',
            'approval_status' => 'nullable|string',
        ]);

        Testimonial::create($request->all());

        return redirect()->route('testimonials.show', Testimonial::latest()->first());
    }

    // Display a list of testimonials
    public function index()
    {
        $testimonials = Testimonial::where('approval_status', 'approved')->get();
        return Inertia::render('Testimonials/Index', ['testimonials' => $testimonials]);
    }
}