<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data['locations'] = \App\Models\TourLocation::where('status', 'active')->count();
        $data['packages'] = \App\Models\TourPackage::count();
        $data['guests'] = \App\Models\Guest::count();
        $data['bookings'] = \App\Models\Booking::count();
        return view('adminpanel.pages.home.dashboard', compact('data'));
    }
}
