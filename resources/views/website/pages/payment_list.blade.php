@extends('website.layouts.weblayout')

@section('title')
    Pembayaran
@endsection

@section('content')
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h5 class="text-primary">Halaman Pembayaran #{{ $bookingNumber }}</h5>
            <div class="alert alert-info">
                Pesananmu terkirim. Yuk, selesaikan pembayaran melalui channel bank di bawah ini!
            </div>
            <div class="row">
                <div class="col-12 my-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="text-primary">KomodoExplore</h5>
                                    <h6>No. Faktur: {{ $invoice->number }}</h6>
                                    <p>Tanggal: {{ date('d/m/Y', strtotime($invoice->date)) }}</p>
                                </div>
                                <div class="col-6 mt-3 text-right">
                                    <h6>Status: <span class="{{ $invoice->status === 'Unpaid' ? 'text-danger' : 'text-success' }}">{{ $invoice->status }}</span></h6>
                                    <p class="font-weight-semi-bold">{{ $invoice->guest->fullname }}</p>
                                    <p>Phone: {{ $invoice->guest->phone }} | Email: {{ $invoice->guest->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Paket  Wisata</th>
                                        <th>Harga (Rp.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $invoice->booking->packages->package_name}}</td>
                                        <td>Rp.{{ number_format($invoice->booking->packages->price, 0, '.', '.')}}</td>
                                    </tr>
                                </tbody>
                            </table>

{{--                            PAYMENT CHANNELS--}}
                            <h5>Channel Pembayaran</h5>
                            <p class="mb-3">Silahkan melakukan pembayaran melalui salah satu Channel Bank dibawah ini.</p>
                            <div class="row">
                                @foreach($payChannels as $channel)
                                    <div class="col-md-4">
                                        <div class="package-item bg-white mb-2">
                                            <div class="p-4 text-center">
                                                <img class="img-fluid" src="{{ $channel->logo }}" alt="bank logo" height="90" width="90">
                                                <br>
                                                <br>
                                                <span class="font-weight-bold">
                                {{ $channel->bank_number }}
                            </span>
                                                <p>{{ $channel->name }}</p>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="text-center mt-5">
                <a href="" class="btn btn-primary">Cek Pembayaran</a>
            </div>
        </div>
    </div>

@endsection


