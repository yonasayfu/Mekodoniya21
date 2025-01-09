<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Inertia\Inertia;

class InvoiceController extends Controller
{
   // Display a list of invoices
   public function index()
   {
       $invoices = Invoice::with('event')->get();
       return Inertia::render('Invoices/Index', ['invoices' => $invoices]);
   }

   // Show the form for creating a new invoice
   public function create()
   {
       return Inertia::render('Invoices/Create');
   }

   // Store a newly created invoice in the database
   public function store(Request $request)
   {
       $request->validate([
           'event_id' => 'required|exists:events,id',
           'amount' => 'required|numeric',
           'date' => 'required|date',
           'status' => 'required|string',
       ]);

       Invoice::create($request->all());

       return redirect()->route('invoices.index');
   }

   // Display the specified invoice
   public function show(Invoice $invoice)
   {
       return Inertia::render('Invoices/Show', ['invoice' => $invoice]);
   }

   // Show the form for editing the specified invoice
   public function edit(Invoice $invoice)
   {
       return Inertia::render('Invoices/Edit', ['invoice' => $invoice]);
   }

   // Update the specified invoice in the database
   public function update(Request $request, Invoice $invoice)
   {
       $request->validate([
           'event_id' => 'required|exists:events,id',
           'amount' => 'required|numeric',
           'date' => 'required|date',
           'status' => 'required|string',
       ]);

       $invoice->update($request->all());

       return redirect()->route('invoices.index');
   }

   // Remove the specified invoice from the database
   public function destroy(Invoice $invoice)
   {
       $invoice->delete();
       return redirect()->route('invoices.index');
   }
}
