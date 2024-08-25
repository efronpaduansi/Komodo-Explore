<?php

namespace App\Http\Controllers\Admin\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = \App\Models\Hotel::all();
        return view('adminpanel.pages.hotels.manage', compact('hotels'));
    }
}
