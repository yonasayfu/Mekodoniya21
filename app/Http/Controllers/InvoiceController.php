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

    // Display the specified invoice
    public function show(Invoice $invoice)
    {
        return Inertia::render('Invoices/Show', ['invoice' => $invoice]);
    }
}