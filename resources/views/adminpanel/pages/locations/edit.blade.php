@extends('adminpanel.layouts.app')

@section('title')
    Edit Lokasi
@endsection

@section('page-heading')
    Edit "{{ $location->location_name }}"
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.locations_update', $location->id) }}" method="post" data-parsley-validate enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12 mandatory">
                        <label for="locationName" class="form-label">Nama Lokasi</label>
                        <input type="text" name="locationName" id="locationName" value="{{ $location->location_name }}" class="form-control" data-parsley-required="true" autofocus>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="locationThumbnail" class="form-label">Thumbnail</label>
                        <input type="file" name="locationThumbnail" id="locationThumbnail" class="form-control">
                        <small>Ekstensi yang diperbolehkan: .PNG, .JPG, .JPEG. Ukuran max: 512 KB</small>
                        <small class="text-danger">Kosongkan jika tidak ingin mengubah gambar.</small>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12 mandatory">
                        <label for="locationDescription" class="form-label">Deskripsi</label>
                        <textarea name="locationDescription" id="locationDescription" cols="30" rows="3" class="form-control" data-parsley-required="true">
                            {{ $location->description }}
                        </textarea>
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
