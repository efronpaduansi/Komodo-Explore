<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileSettingController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user()->id;
        $user = \App\Models\User::where('id', $currentUser)->first();
        return view('adminpanel.pages.settings.profile_settings', compact('user'));
    }

    public function update(ProfileUpdateRequest $request, $id)
    {
        //Validasi
        $validator = $request->validated();

        if(!$validator){
            return back()->with('errors', $validator->messages()->all()[0])->withInput(['name', 'email']);
        }

        $user = \App\Models\User::findOrFail($id);

        if(Hash::check($request->oldPass, $user->password)){
            $userData = [
                'name' =>  $this->cleanData($request->name),
                'email' => $this->cleanData($request->email),
            ];

            if(!empty($request->newPass)){
                $userData['password'] = Hash::make($request->newPass);
            }

            //Update user profile
            $update = $user->update($userData);

            if($update){
                return back()->withSuccess('Profile Anda sudah diupdate');
            }
            return back()->withErrors('Update gagal!')->withInput(['name', 'email']);
        }else{
            return back()->withErrors('Kata sandi salah!');
        }

    }

    public function updateImage(Request $request, $id)
    {
        //Validasi
        $validator = $request->validate([
            'image_path' => ['required', 'image', 'mimes:png,jpeg,jpg', 'max:512'],
        ], [
            'image_path.image' => 'Format gambar salah!',
            'image_path.max' => 'Gambar terlalu besar!',
        ]);

        if(!$validator){
            return back()->withErrors('Update gagal!');
        }

        if($request->hasFile('image_path')){
            $image = $request->file('image_path');
            $imageName = 'profile_' . time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/images'), $imageName);

            $data['image_path'] = $imageName;
        }

        $updateProfileImage = \App\Models\User::findOrFail($id)->update($data);

        if($updateProfileImage){
            return back()->withSuccess('Foto profil berhasil disimpan!');
        }else{
            return back()->withErrors('Update gagal!');
        }
    }

    private function cleanData($data)
    {
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);

        return $data;
    }
}
