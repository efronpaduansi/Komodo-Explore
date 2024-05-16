@extends('website.layouts.weblayout')

@section('title')
    Paket Wisata
@endsection

@section('content')
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h5 class="text-primary">Detail Pemesanan Paket "{{ $package->package_name }}"</h5>
            <div class="row">
                <div class="col-md-8">
                    <div class="alert alert-info">
                        Ini adalah halaman terakhir sebelum Anda dialihkan ke halaman pembayaran. Harap isi data dengan benar!
                    </div>
                    <div class="package-item bg-white mb-2">
                        <div class="p-4">
                            <form action="{{ route('user.package_booking_store') }}" method="post">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="guests_id" value="{{ Auth::user()->guests_id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-primary font-weight-bold">*PAKET WISATA</p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="package_id" class="form-label">Nama Paket Wisata</label>
                                        <select name="package_id" id="package_id" class="form-control" readonly>
                                            <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="duration" class="form-label">Durasi</label>
                                        <select name="duration" id="duration" class="form-control" readonly>
                                            <option value="">{{ $package->duration }}</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="text-primary font-weight-bold">*DATA PRIBADI & KONTAK</p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fullname" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="fullname" id="fullname" class="form-control" autofocus autocomplete="off" required value="{{ old('fullname', auth()->user()->name) }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email" class="form-label">Email Aktif</label>
                                        <input type="text" name="email" id="email" class="form-control" autocomplete="off" required value="{{ old('email', auth()->user()->email) }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="phone" class="form-label">Telepon/WA</label>
                                        <input type="text" name="phone" id="phone" class="form-control" autocomplete="off" required value="{{ old('phone', auth()->user()->guest->phone) }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="address" class="form-label">Alamat</label>
                                        <input type="text" name="address" id="address" class="form-control" autocomplete="off" required value="{{ old('address') }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="city" class="form-label">Kota</label>
                                        <input type="text" name="city" id="city" class="form-control" autocomplete="off" required value="{{ old('city') }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="country" class="form-label">Negara</label>
                                        <select name="country" id="country" class="form-control" required>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Singapura">Singapura</option>
                                            <option value="Malaysia">Malaysia</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="date" class="form-label">Tanggal Berangkat</label>
                                        <input type="date" name="date" id="date" class="form-control" required value="{{ old('date') }}">
                                        <small class="text-muted font-italic">Tanggal Berangkat tidak boleh kurang dari hari ini.</small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="participant" class="form-label">Jumlah Peserta</label>
                                        <input type="number" name="participant" id="participant" class="form-control" required  value="{{ old('participant') }}" min="1">
                                        <small class="text-muted font-italic">Jumlah Peserta tidak boleh lebih dari {{ $package->participant }} Orang.</small>
                                    </div>

                                </div>
                                <div class="d-flex">
                                    <a href="{{ route('web.package_show', $package->slug) }}" class="btn btn-danger mr-2">Batal</a>
                                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="{{ $package->thumbnail }}" alt="thumbnail" height="50%" width="100%">
                        <div class="p-4 text-center">
                            <span class="font-weight-bold">
                                <a href="{{ route('web.package_show', $package->slug) }}">{{ $package->package_name }}</a>
                            </span></a>
                            <p>{{ $package->description }}</p>
                            <p class="font-weight-bold">Rp. {{ number_format($package->price, 0, '.', '.') }} / {{ $package->duration }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
