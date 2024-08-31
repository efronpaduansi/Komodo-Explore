@extends('adminpanel.layouts.app')

@section('title')
    Edit Hotel
@endsection

@section('page-heading')
    Edit Hotel
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.hotels_update', $hotel->id) }}" method="post" data-parsley-validate enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12 mandatory">
                        <label for="addImage" class="form-label">Gambar</label>
                        <input type="file" name="addImage" id="addImage" accept=".png,.jpg,.jpeg" class="form-control" data-parsley-required="true" autofocus value="{{ old('addImage') }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12 mandatory">
                        <label for="addName" class="form-label">Nama Hotel</label>
                        <input type="text" name="addName" id="addName" class="form-control" data-parsley-required="true" autofocus value="{{ old('addName', $hotel->name) }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12 mandatory">
                        <label for="addAddress" class="form-label">Alamat</label>
                        <input type="text" name="addAddress" id="addAddress" class="form-control" data-parsley-required="true" autofocus value="{{ old('addAddress', $hotel->address) }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12 mandatory">
                        <label for="addCity" class="form-label">Kota</label>
                        <input type="text" name="addCity" id="addCity" class="form-control" data-parsley-required="true" autofocus value="{{ old('addCity', $hotel->city) }}">
                    </div>
                    <div class="form-group col-md-4 col-sm-12 mandatory">
                        <label for="addPhone" class="form-label">Telepon</label>
                        <input type="text" name="addPhone" id="addPhone" class="form-control" data-parsley-required="true" autofocus value="{{ old('addPhone', $hotel->phone) }}">
                    </div>

                    <div class="form-group col-md-4 col-sm-12 mandatory">
                        <label for="addEmail" class="form-label">Email Aktif</label>
                        <input type="email" name="addEmail" id="addEmail" class="form-control" data-parsley-required="true" value="{{ old('addEmail', $hotel->email) }}">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="addWebsite" class="form-label">Website</label>
                        <input type="url" name="addWebsite" id="addWebsite" class="form-control" data-parsley-required="false" value="{{ old('addWebsite', $hotel->website) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 col-sm-12 mandatory">
                        <label for="addPrice" class="form-label">Harga</label>
                        <input type="number" name="addPrice" id="addPrice" class="form-control" value="{{ old('addPrice', $hotel->price) }}"  data-parsley-required="true">
                    </div>
                    <div class="form-group col-md-4 col-sm-12 mandatory">
                        <label for="addCheckinTime" class="form-label">Waktu Checkin</label>
                        <input type="time" name="addCheckinTime" id="addCheckinTime" class="form-control"  data-parsley-required="true" value="{{ $hotel->checkin_time }}">
                    </div>
                    <div class="form-group col-md-4 col-sm-12 mandatory">
                        <label for="addCheckoutTime" class="form-label">Waktu Checkout</label>
                        <input type="time" name="addCheckoutTime" id="addCheckoutTime" class="form-control"  data-parsley-required="true" value="{{ $hotel->checkout_time }}">
                    </div>
                    <div class="form-group col-md-12 col-sm-12 mandatory">
                        <label for="addDescription" class="form-label">Deskripsi</label>
                       <textarea name="addDescription" id="addDescription" data-parsley-required="true" cols="30" rows="4" class="form-control">{{ $hotel->description }}</textarea>
                    </div>
                </div>

                <div class="d-flex mt-3">
                    <a href="{{ route('admin.hotels_index') }}" class="btn btn-danger me-2">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

