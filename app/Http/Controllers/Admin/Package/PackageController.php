<?php

namespace App\Http\Controllers\Admin\Package;

use Alert;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\Package\PackageStoreRequest;
use App\Http\Requests\Admin\Package\PackageUpdateRequest;

class PackageController extends Controller
{
    public function index()
    {
        $packages = \App\Models\TourPackage::latest()->with(['hotel', 'resto'])->get();
        return view('adminpanel.pages.packages.manage', compact('packages'));
    }

    public function create()
    {
        $locations = \App\Models\TourLocation::where('status', 'active')->get();
        $hotels = \App\Models\Hotel::get(['id', 'name']);
        $restaurants = \App\Models\Restaurant::get(['id', 'name']);
        return view('adminpanel.pages.packages.add', compact('locations', 'hotels', 'restaurants'));
    }

    public function store(PackageStoreRequest $request)
    {
        //validasi
        $validator = $request->validated();

        if($validator){
            if($request->hasFile('packageImage')){
                $image = $request->file('packageImage');
                $imageName = time(). '_' .rand(1000,9999) .'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/images'), $imageName);

                $thumbnail = $imageName;
            }

            $data = [
                'thumbnail'     => $thumbnail,
                'package_name'  => $request->packageName,
                'slug'          => Str::slug($request->packageName),
                'description'   => $request->packageDescription,
                'duration'      => $request->packageDuration,
                'price'         => $request->packagePrice,
                'participant'   => $request->packageParticipant,
                'hotels_id'     => $request->hotels_id,
                'restaurants_id'=> $request->restaurants_id,
            ];

            // Simpan data paket wisata
            $package = \App\Models\TourPackage::create($data);

            // Simpan relasi antara paket wisata dan lokasi
            $saveData = $package->locations()->attach($request->locations);

            return redirect()->route('admin.packages_index')->withSuccess('Simpan berhasil');

        }else{
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }
    }

    public function show($id)
    {
        $package = \App\Models\TourPackage::findOrFail($id);
        // Mengambil semua lokasi terkait dengan paket wisata
        $locations = $package->locations;
        return view('adminpanel.pages.packages.show', compact('package', 'locations'));
    }

    //Change tour package image/thumbnail
    public function changeImage(Request $request, $id)
    {
        //Validasi image
        $imgValidator = Validator::make($request->all(), [
            'packageImage'  => 'required|image|mimes:png,jpg,jpeg|max:512',
        ], [
            'packageImage.required' => 'Gambar tidak boleh kosong!',
            'packageImage.image'    => 'Format gambar salah!',
            'packageImage.max'      => 'Gambar terlalu besar. Maksimal: 512 KB!',
        ]);

        if($imgValidator->fails()){
            return back()->with('errors', $imgValidator->messages()->all()[0])->withInput();
        }

        $image = $request->file('packageImage');
        $imageName = time(). '_' .rand(1000,9999) .'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/images'), $imageName);

        $thumbnail = $imageName;
        $imgUpdate = \App\Models\TourPackage::findOrFail($id)->update(array('thumbnail' => $thumbnail));

        if($imgUpdate){
            return back()->withSuccess('Gambar berhasil di ubah!');
        }else{
            return back()->withErrors('Gambar gagal di ubah!');
        }
    }

    public function edit($id)
    {

        $package = \App\Models\TourPackage::findOrFail($id);

        // Dapatkan semua lokasi dari database
        $locations = \App\Models\TourLocation::all();

        // Dapatkan lokasi-lokasi yang terkait dengan paket wisata yang sedang diedit
        $selectedLocations = $package->locations->pluck('id')->toArray();

        return view('adminpanel.pages.packages.edit', compact('package', 'locations', 'selectedLocations'));
    }

    public function update(PackageUpdateRequest $request,$id)
    {
        //validasi
        $validator = $request->validated();

        if($validator){

            $data = [
                'package_name'  => $request->packageName,
                'description'   => $request->packageDescription,
                'duration'      => $request->packageDuration,
                'price'         => $request->packagePrice,
                'participant'   => $request->packageParticipant,
            ];

            $updateData = \App\Models\TourPackage::findOrFail($id)->update($data);

            // Perbarui lokasi-lokasi yang terkait dengan paket wisata
            $package = \App\Models\TourPackage::findOrFail($id);
            $package->locations()->sync($request->locations);

            if($updateData){
                return redirect()->route('admin.packages_index')->withSuccess('Update berhasil!');
            }else{
                return back()->withErrors('Update gagal! Silahkan coba lagi');
            }
        }else{
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

    }

    public function destroy($id)
    {
        $deleteData = \App\Models\TourPackage::findOrFail($id)->delete();

        if($deleteData){
            return back()->withSuccess('Data dihapus');
        }else{
            return back()->withErrors('Hapus gagal');
        }
    }
}
