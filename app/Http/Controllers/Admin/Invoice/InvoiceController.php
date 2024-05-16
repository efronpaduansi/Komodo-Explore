<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = \App\Models\Invoice::latest()->get();
        return view('adminpanel.pages.invoices.manage', compact('invoices'));
    }

    public function show($number)
    {
        $invoice = \App\Models\Invoice::where('number', $number)->firstOrFail();
        return view('adminpanel.pages.invoices.show', compact('invoice'));
    }

    //update invoice status to Paid
    public function update(Request $request, $number)
    {
        $status = 'Paid';
        $paymentMethod = 'Bank Transfer';
        $makeInvoicePaid = \App\Models\Invoice::where('number', $number)->update(['status' => $status]);

        if($makeInvoicePaid){
            //Create payment record
            $createPaymentRecord = \App\Models\Payment::create([
                'guests_id' => $request->guests_id,
                'bookings_id' => $request->bookings_id,
                'total_price' => $request->total_price,
                'payment_status' => $status,
                'payment_method' => $paymentMethod,
                'payment_date' => $request->payment_date,
                'noted' => '',
                'payment_channels_id' => $request->payment_channels_id,
                'invoices_id' => $request->invoices_id,
            ]);

            if($createPaymentRecord){
                return back()->withSuccess('Perubahan berhasil disimpan');
            }

            return back()->withErrors('Perubahan gagal disimpan!');
        }
    }
}
