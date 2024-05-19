<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    public function index()
    {
        $curretId = auth()->user()->id;
        $user = \App\Models\User::findOrFail($curretId);
        return view('user.profile', compact('user'));
    }

    public function update(Request $request, $user)
    {
        //Validasi
        $validator = $request->validate([
            'name' => ['required', 'max:100', 'string'],
        ]);

        if($validator){
            //True case
            $userUpdate = \App\Models\User::findOrFail($user)->update([
                'name' => trim(htmlspecialchars($request->name)),
                'email' => trim(htmlspecialchars($request->email)),
            ]);

            if($userUpdate){
                return back()->withSuccess('Profil berhasil diubah!');
            }else{
                return back()->withErrors('Perubahan gagal disimpan!');
            }
        }else{
            //False case
            return back()->with('errors', $validator->messages()->all()[0])->withInput(['name', 'email']);
        }
    }
}
