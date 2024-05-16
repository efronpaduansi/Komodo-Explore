<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = \App\Models\Payment::latest()->get();
        return view('adminpanel.pages.payments.manage', compact('payments'));
    }

    //Delete payment data by id
    public function destroy(Request $request, $id)
    {
        $invoiceId = $request->invoice_id;
        $deletePaymentData = \App\Models\Payment::findOrFail($id)->delete();

        if($deletePaymentData){
            //Change invoice status into Unpaid
            $changeInvoiceStatus = \App\Models\Invoice::where('id', $invoiceId)->update([
               'status' => 'Unpaid'
            ]);
            return back()->withSuccess('Data dihapus!');
        }

        return back()->withErrors('Gagal menghapus data!');
    }
}
