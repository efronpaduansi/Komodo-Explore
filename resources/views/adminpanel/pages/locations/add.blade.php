@extends('adminpanel.layouts.app')

@section('title')
    Tambah Lokasi
@endsection

@section('page-heading')
    Tambah Lokasi
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.locations_store') }}" method="post" data-parsley-validate enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12 mandatory">
                        <label for="locationName" class="form-label">Nama Lokasi</label>
                        <input type="text" name="locationName" id="locationName" class="form-control" data-parsley-required="true" autofocus>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 mandatory">
                        <label for="locationThumbnail" class="form-label">Thumbnail</label>
                        <input type="file" name="locationThumbnail" id="locationThumbnail" class="form-control" data-parsley-required="true">
                        <small>Ekstensi yang diperbolehkan: .PNG, .JPG, .JPEG. Ukuran max: 512 KB</small>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12 mandatory">
                        <label for="locationDescription" class="form-label">Deskripsi</label>
                        <textarea name="locationDescription" id="locationDescription" cols="30" rows="3" class="form-control" data-parsley-required="true"></textarea>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 mandatory">
                        <label for="locationStatus" class="form-label">Status</label>
                        <select name="locationStatus" id="locationStatus" class="form-select" data-parsley-required="true">
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex mt-3">
                    <a href="{{ route('admin.locations_index') }}" class="btn btn-danger me-2">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
