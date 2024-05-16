<?php

namespace App\Http\Controllers\Admin\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Arr;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = \App\Models\Booking::latest()->get();
        return view('adminpanel.pages.bookings.manage', compact('bookings'));
    }

    /**
     * Confirmed booking data
     */
    public function confirmed($id)
    {
        $status = 'Confirmed';

        $confirmedData = \App\Models\Booking::findOrFail($id)->update(['status' => $status]);
        if($confirmedData){
            return back()->withSuccess('Pesanan dikonfirmasi');
        }else{
            return back()->withErrors('Perubahan gagal disimpan!');
        }
    }


    /**
     * Cancelled booking data
     */
    public function cancelled($id)
    {
        $status = 'Cancelled';

        $cancelledData = \App\Models\Booking::findOrFail($id)->update(['status' => $status]);
        if($cancelledData){
            return back()->withSuccess('Pesanan dibatalkan');
        }else{
            return back()->withErrors('Perubahan gagal disimpan!');
        }
    }

    public function destroy($id)
    {
        $deleteData = \App\Models\Booking::findOrFail($id)->delete();

        if($deleteData){
            return back()->withSuccess('Hapus berhasil');
        }

        return back()->withErrors('Hapus gagal!');
    }
}
