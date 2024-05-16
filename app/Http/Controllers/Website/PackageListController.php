<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PackageListController extends Controller
{
    public function index()
    {
        $packages = \App\Models\TourPackage::all();
        return view('website.pages.package', compact('packages'));
    }

    public function show($slug)
    {
        $package = \App\Models\TourPackage::where('slug', $slug)->firstOrFail();
        $locations = $package->locations;
        return view('website.pages.package_detail', compact('package', 'locations'));
    }

}
