<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Payment\PaymentChannelStoreRequest;
use App\Http\Requests\Admin\Payment\PaymentChannelUpdateRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentChannelController extends Controller
{
    public function index()
    {
        $channels = \App\Models\PaymentChannel::latest()->get();
        return view('adminpanel.pages.payment_channels.manage', compact('channels'));
    }

    public function create()
    {
        return view('adminpanel.pages.payment_channels.add');
    }

    public function store(PaymentChannelStoreRequest $request)
    {
        $validator = $request->validated();

        if($validator){
            if($request->hasFile('logo')){
                $image = $request->file('logo');
                $logoName = time(). '_' .rand(1000,9999) .'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/images'), $logoName);

                $logo = $logoName;
            }

            $data = [
                'bank_name'         => $request->bank_name,
                'bank_number'       => $request->bank_number,
                'logo'              => $logo,
                'name'              => $request->name,
                'status'            => $request->status,
            ];

            $saveData = \App\Models\PaymentChannel::create($data);
            if($saveData){
                return to_route('admin.payment_channels_index')->withSuccess('Simpan berhasil');
            }else{
                return redirect()->back()->withErrors('Simpan gagal!');
            }

        }else{
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }
    }

    public function edit($id)
    {
        $channel = \App\Models\PaymentChannel::findOrFail($id);
        return view('adminpanel.pages.payment_channels.edit', compact('channel'));
    }

    public function update(PaymentChannelUpdateRequest $request, $id)
    {
        $validator = $request->validated();

        if($validator){
            //True case
            if($request->hasFile('logo')){
                $image = $request->file('logo');
                $logoName = time(). '_' .rand(1000,9999) .'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/images'), $logoName);

                $data['logo'] = $logoName;
            }else{
                $data = [
                    'bank_name'         => $request->bank_name,
                    'bank_number'       => $request->bank_number,
                    'name'              => $request->name,
                    'status'            => $request->status,
                ];
            }

            $updateData = \App\Models\PaymentChannel::findOrFail($id)->update($data);
            if($updateData){
                return to_route('admin.payment_channels_index')->withSuccess('Update berhasil');
            }else{
                return back()->withErrors('Update gagal!');
            }
        }else{
            //False case
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }
    }

    /* Do active payment channel by id */
    public function doActive($id)
    {
        $paymentChannel = \App\Models\PaymentChannel::findOrFail($id);
        $activated = $paymentChannel->update(['status' => 'active']);
        if($activated){
            return to_route('admin.payment_channels_index')->withSuccess('Channel Diaktifkan!');
        }else{
            return to_route('admin.payment_channels_index')->withErrors('Update gagal!');
        }
    }

    public function destroy($id)
    {
        $deleteData = \App\Models\PaymentChannel::findOrFail($id)->delete();
        if($deleteData){
            return to_route('admin.payment_channels_index')->withSuccess('Hapus berhasil');
        }else{
            return to_route('admin.payment_channels_index')->withErrors('Hapus gagal!');
        }
    }

}
