@extends('website.layouts.weblayout')

@section('title')
    Paket Wisata
@endsection

@section('content')
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h5 class="text-primary">Detail Paket "{{ $package->package_name }}"</h5>
            <div class="row">
                <div class="col-md-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="{{ $package->thumbnail }}" alt="thumbnail" height="50%" width="100%">
                        <div class="p-4">
                            <span class="font-weight-bold">
                                <a href="{{ route('web.package_show', $package->slug) }}">{{ $package->package_name }}</a>
                            </span></a>
                            <p>{{ $package->description }}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tr>
                            <th>Nama Paket</th>
                            <td>{{ $package->package_name }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $package->description }}</td>
                        </tr>
                        <tr>
                            <th>Durasi</th>
                            <td>{{ $package->duration }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>{{ "Rp." . number_format($package->price, 0, '.', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Peserta</th>
                            <td>{{ $package->participant . " Orang" }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>
                                @foreach($locations as $location)
                                    {{ $location->location_name }}
                                    @if(!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    </table>
                    <a href="{{ route('user.package_booking', $package->slug) }}" class="btn btn-primary">Pesan Sekarang</a>

                </div>
            </div>
        </div>
    </div>
@endsection
