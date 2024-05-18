@extends('adminpanel.layouts.app')

@section('title')
    Pengaturan Profil
@endsection

@section('page-heading')
    Pengaturan Profil
@endsection


@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Foto Profil</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div class="avatar avatar-2xl">
                            @if(isset($user->image_path) && $user->image_path !== NULL)
                                <img src="{{ $user->image_path }}" alt="Avatar">
                            @else
                                <img src="{{ asset('mazer/compiled/jpg/2.jpg') }}" alt="Avatar">
                            @endif
                        </div>

                        <h3 class="mt-3">{{ $user->name }}</h3>
                        <p class="text-small">{{ $user->email }}</p>

                        <div class="d-inline">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#imageModal"><i class="bi bi-image"></i> Ganti Foto</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Biodata</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.settings_profile_update', $user->id) }}" method="post" >
                        @csrf
                        @method('PUT')
                        <div class="form-group mandatory">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" data-parsley-required="true">
                        </div>
                        <div class="form-group mandatory">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" data-parsley-required="true" data-parsley-type="email">
                        </div>
                        <small class="fst-italic">*Ubah Kata Sandi (Kosongkan jika tidak ingin mengubah kata sandi)</small>
                        <div class="form-group">
                            <label for="oldPass" class="form-label">Kata Sandi saat ini</label>
                            <input type="password" name="oldPass" id="oldPass" class="form-control" placeholder="Masukan Kata Sandi saat ini">
                        </div>
                        <div class="form-group">
                            <label for="newPass" class="form-label">Kata Sandi </label>
                            <input type="password" name="newPass" id="newPass" class="form-control" placeholder="Masukan Kata Sandi">
                        </div>
                        <div class="form-group">
                            <label for="confirmPass" class="form-label">Ulangi Kata Sandi </label>
                            <input type="password" name="confirmPass" id="confirmPass" class="form-control" placeholder="Ulangi Kata Sandi" data-parsley-equalto="#newPass">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Foto Profil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.settings_profile_update_image', $user->id) }}" method="post" data-parsley-validate data-parsley-validate enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group mandatory">
                            <label for="image_path" class="form-label">Pilih Foto Profil</label>
                            <input type="file" name="image_path" id="image_path" accept=".png,.jpeg,.jpg" class="form-control" data-parsley-required="true">
                            <small class="fst-italic">Ekstensi yang diperbolehkan: .PNG,.JPG,.JPEG. Maksimal: 512KB</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
