<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = \App\Models\TourLocation::all();
        return view('website.pages.destination', compact('destinations'));
    }
}
