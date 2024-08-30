<?php

namespace App\Http\Controllers\Admin\Hotel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hotel\HotelStoreRequest;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = \App\Models\Hotel::all();
        return view('adminpanel.pages.hotels.manage', compact('hotels'));
    }

    public function create()
    {
        return view('adminpanel.pages.hotels.add');
    }

    public function store(HotelStoreRequest $request)
    {
        $validated = $request->validated();

        if($validated){
            $image = $request->file('addImage');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/images'), $imageName);

            $hotel = [
                'name'  => $request->addName,
                'description' => $request->addDescription,
                'address' => $request->addAddress,
                'city'  => $request->addCity,
                'phone' => $request->addPhone,
                'email' => $request->addEmail,
                'website' => $request->addWebsite,
                'price' => $request->addPrice,
                'checkin_time' => $request->addCheckinTime,
                'checkout_time' => $request->addCheckoutTime,
                'image_path' => $imageName,
            ];

            $save = \App\Models\Hotel::create($hotel);

            if($save){
                return redirect()->route('admin.hotels_index')->withSuccess('Simpan berhasil');
            }else{
                return back()->withErrors('Simpan gagal');
            }
        }
        return back()->withErrors('Simpan gagal')->withInput();
    }

    public function destroy($id)
    {
        if(is_null($id))
        {
            return back();
        }

        //Delete hotel data by Id
        $delete = \App\Models\Hotel::findOrFail($id)->delete();

        if($delete){
            return back()->withSuccess('Hapus berhasil');
        }
        return back()->withErrors('Hapus gagal. Silahkan coba lagi!');
    }
}
