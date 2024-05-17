<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = \App\Models\WebSetting::first();
        return view('adminpanel.pages.settings.web_settings', compact('setting'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $updateSetting = \App\Models\WebSetting::where('id', $request->id)->update([
           'company_name' =>  $this->cleanData($request->company_name),
            'about_tag' => $this->cleanData($request->about_tag),
            'about_text' => $this->cleanData($request->about_text),
            'email' => $this->cleanData($request->email),
            'phone' => $this->cleanData($request->phone),
            'phone' => $this->cleanData($request->phone),
            'facebook' => $this->cleanData($request->facebook),
            'instagram' => $this->cleanData($request->instagram),
            'twitter' => $this->cleanData($request->twitter),
            'twitter' => $this->cleanData($request->twitter),
            'youtube' => $this->cleanData($request->youtube),
        ]);

        if($updateSetting){
            return back()->withSuccess('Perubahan disimpan!');
        }else{
            return back()->withErrors('Simpan gagal!');
        }
    }

    private function cleanData($data)
    {
        $data = htmlspecialchars($data);
        $data = trim($data);
        return $data;
    }
}
