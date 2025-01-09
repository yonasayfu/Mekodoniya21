<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Supporter;

class SupporterController extends Controller
{
   // Display a list of supporters
   public function index()
   {
       $supporters = Supporter::all();
       return Inertia::render('Supporters/Index', ['supporters' => $supporters]);
   }

   // Show the form for creating a new supporter
   public function create()
   {
       return Inertia::render('Supporters/Create');
   }

   // Store a newly created supporter in the database
   public function store(Request $request)
   {
       $request->validate([
           'name' => 'required|string|max:255',
           'age' => 'required|integer',
           'gender' => 'required|string',
           'address' => 'required|string',
           'phone_number' => 'required|string',
           'email' => 'required|email',
           'support_type' => 'required|string',
           'contribution_amount' => 'required|numeric',
           'commit_duration' => 'required|integer',
           'start_date' => 'required|date',
           'bank_details' => 'nullable|string',
           'visitation_preference' => 'nullable|string',
       ]);

       Supporter::create($request->all());

       return redirect()->route('supporters.index');
   }

   // Display the specified supporter
   public function show(Supporter $supporter)
   {
       return Inertia::render('Supporters/Show', ['supporter' => $supporter]);
   }

   // Show the form for editing the specified supporter
   public function edit(Supporter $supporter)
   {
       return Inertia::render('Supporters/Edit', ['supporter' => $supporter]);
   }

   // Update the specified supporter in the database
   public function update(Request $request, Supporter $supporter)
   {
       $request->validate([
           'name' => 'required|string|max:255',
           'age' => 'required|integer',
           'gender' => 'required|string',
           'address' => 'required|string',
           'phone_number' => 'required|string',
           'email' => 'required|email',
           'support_type' => 'required|string',
           'contribution_amount' => 'required|numeric',
           'commit_duration' => 'required|integer',
           'start_date' => 'required|date',
           'bank_details' => 'nullable|string',
           'visitation_preference' => 'nullable|string',
       ]);

       $supporter->update($request->all());

       return redirect()->route('supporters.index');
   }

   // Remove the specified supporter from the database
   public function destroy(Supporter $supporter)
   {
       $supporter->delete();
       return redirect()->route('supporters.index');
   }
}
