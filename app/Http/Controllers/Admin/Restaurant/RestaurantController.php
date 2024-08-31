<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Restaurants\RestaurantStoreRequest;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = \App\Models\Restaurant::all();
        return view('adminpanel.pages.restaurants.manage', compact('restaurants'));
    }

    public function create()
    {
        return view('adminpanel.pages.restaurants.add');
    }

    public function store(RestaurantStoreRequest $request)
    {
        $validated  = $request->validated();

        if(!$validated){
            return back()->withErrors('Simpan gagal. Silahkan coba lagi!');
        }

        $image = $request->file('addImage');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/images'), $imageName);

        $postData = [
            'name'      => $request->addName,
            'description' => $request->addDescription,
            'address'   => $request->addAddress,
            'city'      => $request->addCity,
            'phone'     => $request->addPhone,
            'email'     => $request->addEmail,
            'opening_hours' => $request->addOpeningHours,
            'image_path'     => $imageName,
        ];

        $hotel = \App\Models\Restaurant::create($postData);

        if($hotel){
            return to_route('admin.restaurants_index')->withSuccess('Simpan berhasil');
        }
        return back()->withErrors('Simpan gagal. Silahkan coba lagi!');
    }

}
