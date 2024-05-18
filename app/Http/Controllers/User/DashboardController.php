<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->user_roles_id !== 3){
            return redirect('admin');
        }
        $guestId = auth()->user()->guest->id;
        $myBooking = \App\Models\Booking::where('guests_id', $guestId)->get();
        return view('user.dashboard', compact('myBooking'));
    }
}
