<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\PackageBookingStoreRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PackageBookingController extends Controller
{
    public function index($slug)
    {
        $package = \App\Models\TourPackage::where('slug', $slug)->firstOrFail();
        return view('website.pages.package_booking', compact('package'));
    }

    /*Generate booking number*/
    private function generateBookingNumber()
    {
        $bookingNumber = 'BK' . date('Ymd') . mt_rand(1000, 9999);

        while (\App\Models\Booking::where('number', $bookingNumber)->exists()) {
            $this->generateBookingNumber();
        }

        return $bookingNumber;
    }

    //Generate invoice number
    private function generateInvoiceNumber()
    {
        $invoiceNumber = 'INV' . date('Ymd') . mt_rand(1000, 9999);

        while (\App\Models\Invoice::where('number', $invoiceNumber)->exists()) {
            $this->generateInvoiceNumber();
        }

        return $invoiceNumber;
    }

    public function bookingStore(PackageBookingStoreRequest $request)
    {
        //validated
        $validator = $request->validated();

        if($validator){
            //True case
            //check tour package participant
            $package_id = $request->package_id;
            $package = \App\Models\TourPackage::findOrFail($package_id);
            $package_participant = $package->participant;

            if($request->participant > $package_participant){
                return back()->withToastWarning('Jumlah peserta tidak boleh lebih dari batas max.')->withInput();
            }

            //check date
            $today = Carbon::today()->toDateString();
            if($request->date < $today || $request->date == $today){
                return back()->withToastWarning('Tanggal berangkat harus lebih besar dari hari ini.')->withInput();
            }

            $data = [
                'number'            => $this->generateBookingNumber(),
                'guests_id'         => $request->guests_id,
                'tour_packages_id'  => $package_id,
                'participant_count' => $request->participant,
                'date'              => $request->date,
            ];

            $saveBookingData = \App\Models\Booking::create($data);
            if($saveBookingData){
                $bookNumber = $saveBookingData->number;
                $latestBookingData = \App\Models\Booking::latest()->first();

                //Generate invoice
                $generateInvData = \App\Models\Invoice::create([
                    'number' => $this->generateInvoiceNumber(),
                    'guests_id' => $latestBookingData->guests_id,
                    'bookings_id' => $latestBookingData->id,
                    'total' => $latestBookingData->packages->price,
                ]);

                if($generateInvData){
                    $this->bookingPayment($bookNumber);
                }
                $request->session()->put('bookingSession', $bookNumber);

                return to_route('user.package_booking_payment', $bookNumber);
            }else{
                return back()->withToastError('Terjadi kesalahan. Silahkan coba lagi.')->withInput();
            }

        }else{
            //False case
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }
    }


    public function bookingPayment($bookingNumber)
    {
        //cek session
//        $bookingSession = $request->session()->get('bookingSession');
//
//        if(!$bookingSession){
//            return  to_route('web.package');
//        }

        //cek booking number
        $booking = \App\Models\Booking::where('number', $bookingNumber)->first();
        if(!$booking){
            return view('website.pages.payment_not_found');
        }
        $invoice = \App\Models\Invoice::where('bookings_id', $booking->id)->first();
        $payChannels = \App\Models\PaymentChannel::where('status', 'active')->get();
        return view('website.pages.payment_list', compact('invoice', 'payChannels', 'bookingNumber'));

    }

}
