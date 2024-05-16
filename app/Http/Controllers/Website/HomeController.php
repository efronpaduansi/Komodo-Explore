<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $packages = \App\Models\TourPackage::all();
        $destinations = \App\Models\TourLocation::all();
        return view('website.pages.homepage', compact('packages', 'destinations'));
    }
}
