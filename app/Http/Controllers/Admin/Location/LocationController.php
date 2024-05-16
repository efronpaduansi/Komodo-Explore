<?php

namespace App\Http\Controllers\Admin\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Location\LocationStoreRequest;
use App\Http\Requests\Admin\Location\LocationUpdateRequest;

class LocationController extends Controller
{
    public function index()
    {
        $locations = \App\Models\TourLocation::latest()->get();
        return view('adminpanel.pages.locations.manage', compact('locations'));
    }

    public function create()
    {
        return view('adminpanel.pages.locations.add');
    }

    public function store(LocationStoreRequest $request)
    {
        //Validation
        $validator = $request->validated();

        if($validator){
            $image = $request->file('locationThumbnail');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/images'), $imageName);

            $locations = [
                'thumbnail'     => $imageName,
                'location_name' => $request->locationName,
                'description'   => $request->locationDescription,
                'status'        => $request->locationStatus,
            ];
//            dd($locations);
            $saveData = \App\Models\TourLocation::create($locations);
            if($saveData){
                return redirect()->route('admin.locations_index')->withSuccess('Simpan berhasil');
            }else{
                return back()->withErrors('Simpan gagal');
            }
        }else{
                return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

    }

    public function show($id)
    {
        $location = \App\Models\TourLocation::findOrFail($id);
        return view('adminpanel.pages.locations.show', compact('location'));
    }

    public function edit($id)
    {
        $location = \App\Models\TourLocation::findOrFail($id);
        return view('adminpanel.pages.locations.edit', compact('location'));
    }

    public function update(LocationUpdateRequest $request, $id)
    {
       //Validation
       $validator = $request->validated();

       $location = \App\Models\TourLocation::findOrFail($id);

       if($validator){

        $data = [
            'location_name' => $request->locationName,
            'description'   => $request->locationDescription,
            'status'        => $request->locationStatus,
        ];

           if($request->hasFile('locationThumbnail')){
                $image = $request->file('locationThumbnail');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/images'), $imageName);

                $data['thumbnail'] = $imageName;
           }

           //Update data
           $updateData = $location->update($data);

           if($updateData){
                return redirect()->route('admin.locations_index')->withSuccess('Update berhasil');
           }else{
               return back()->withErrors('Update gagal');
           }

       }else{
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
       }

    }

    public function destroy($id)
    {
        $deleteData = \App\Models\TourLocation::findOrFail($id)->delete();
        if($deleteData){
            return back()->withSuccess('Data dihapus');
        }else{
            return back()->withErrors('Hapus gagal');
        }
    }

}
