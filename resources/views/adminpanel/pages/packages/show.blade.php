@extends('adminpanel.layouts.app')

@section('title')
    {{ $package->package_name }}
@endsection

@section('page-heading')
    Detail "{{ $package->package_name }}"
@endsection

@section('content')
    <div class="row">
        {{-- tour package thumbnail --}}
        <div class="col-lg-5 col-md-5 col-sm-12">
            <div class="card shadow" style="width: 100%;">
                <img src="{{ $package->thumbnail }}" class="card-img-top" alt="thumbnail">
                <div class="card-body text-center">
                  <h5 class="card-title">{{ $package->package_name }}</h5>
                  <p class="card-text">{{ $package->description }}</p>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#imgModal" class="btn btn-primary">Ubah Gambar</a>
                </div>
              </div>
        </div>

        {{-- tour package detail --}}
        <div class="col-lg-7 col-md-7 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <a href="{{ route('admin.packages_index') }}" class="btn btn-sm btn-danger me-2">Kembali</a>
                        <a href="{{ route('admin.packages_edit', $package->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Nama Paket</th>
                            <td>{{ $package->package_name }}</td>
                        </tr>
                        <tr>
                            <th>Durasi Waktu</th>
                            <td>{{ $package->duration }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>{{ "Rp." . number_format($package->price, 0, '.', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Peserta</th>
                            <td>{{ $package->participant . " Orang" }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $package->description }}</td>
                        </tr>
                        <tr>
                            <th>Daftar Lokasi</th>
                            <td>
                                @foreach($locations as $location)
                                    {{ $location->location_name }}
                                    @if(!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Terakhir di Ubah</th>
                            <td>{{ date('d-m-Y, H:i:s', strtotime($package->updated_at)) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Change image modal --}}
    <div class="modal fade" id="imgModal" tabindex="-1" aria-labelledby="imgModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="imgModalLabel">Ubah Gambar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.packages_changeImage', $package->id) }}" method="post" enctype="multipart/form-data" data-parsley-validate>
                    @csrf
                    @method('PUT')
                    <div class="form-group mandatory">
                        <label for="packageImage" class="form-label">Gambar</label>
                        <input type="file" name="packageImage" id="packageImage" class="form-control" data-parsley-required="true">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
@endsection
