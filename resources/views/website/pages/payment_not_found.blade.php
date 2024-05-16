@extends('website.layouts.weblayout')

@section('title')
    Pembayaran
@endsection

@section('content')
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3 text-center">
            <img src="{{ asset('travel/img/404.jpg') }}" width="400" height="400" class="rounded-circle">
            <h2 class="text-primary text-center">Halaman Pembayaran tidak di temukan!</h2>
            <p class="text-center">
                Sepertinya Anda salah jalan atau alamat. Yuk balik sebelum gelap.
            </p>
            <a href="{{ route('web.package') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>

@endsection


