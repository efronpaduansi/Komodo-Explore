<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = \App\Models\Guest::latest()->get();
        return view('adminpanel.pages.guests.manage', compact('guests'));
    }

    public function show($id)
    {
        $guest = \App\Models\Guest::findOrFail($id);
        return view('adminpanel.pages.guests.show', compact('guest'));
    }

    public function destroy($id)
    {
        $deleteData = \App\Models\Guest::findOrFail($id)->delete();

        if($deleteData){
            return back()->withSuccess('Hapus berhasil');
        }

        return back()->withErrors('Hapus gagal!');
    }
}
