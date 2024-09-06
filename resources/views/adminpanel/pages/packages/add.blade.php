@extends('adminpanel.layouts.app')

@section('title')
    Tambah Paket Wisata
@endsection

@section('page-heading')
    Tambah Paket Wisata
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.packages_store') }}" method="post" enctype="multipart/form-data" data-parsley-validate>
                @csrf
                @method('POST')
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mandatory">
                        <label for="packageImage" class="form-label">Thumbnail</label>
                        <input type="file" name="packageImage" id="packageImage" class="form-control" accept=".png,.jpeg,.jpg" data-parsley-required="true">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mandatory">
                        <label for="packageName" class="form-label">Nama Paket Wisata</label>
                        <input type="text" name="packageName" id="packageName" class="form-control" data-parsley-required="true" autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mandatory">
                        <label for="packageDuration" class="form-label">Durasi</label>
                        <select name="packageDuration" id="packageDuration" class="form-select">
                            <option value="1 Hari">1 Hari</option>
                            <option value="2 Hari">2 Hari</option>
                            <option value="3 Hari">3 Hari</option>
                            <option value="4 Hari">4 Hari</option>
                            <option value="5 Hari">5 Hari</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mandatory">
                        <label for="packagePrice" class="form-label">Harga</label>
                        <input type="number" name="packagePrice" id="packagePrice" class="form-control" data-parsley-required="true">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mandatory">
                        <label for="packageParticipant" class="form-label">Jumlah Peserta</label>
                        <input type="number" name="packageParticipant" id="packageParticipant" class="form-control" data-parsley-required="true">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mandatory">
                        <label for="locations" class="form-label">Pilih Lokasi</label>
                        <select name="locations[]" id="locations" class="form-select choices multiple-remove" multiple="multiple" data-parsley-required="true">
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mandatory">
                        <label for="hotels_id" class="form-label">Pilih Hotel</label>
                        <select name="hotels_id" id="hotels_id" class="form-select choices" data-parsley-required="true">
                            @foreach($hotels as $hotel)
                                <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mandatory">
                        <label for="restaurants_id" class="form-label">Pilih Restoran</label>
                        <select name="restaurants_id" id="restaurants_id" class="form-select choices" data-parsley-required="true">
                            @foreach($restaurants as $resto)
                                <option value="{{ $resto->id }}">{{ $resto->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-12 mandatory">
                        <label for="packageDescription" class="form-label">Deskripsi</label>
                        <textarea name="packageDescription" id="packageDescription" cols="30" rows="4" class="form-control" data-parsley-required="true"></textarea>
                    </div>
                </div>

                <div class="d-flex">
                    <a href="{{ route('admin.packages_index') }}" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-success ms-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
