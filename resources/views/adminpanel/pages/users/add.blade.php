@extends('adminpanel.layouts.app')

@section('title')
    Tambah Pengguna
@endsection

@section('page-heading')
    Tambah Pengguna
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users_store') }}" method="post" data-parsley-validate enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12 mandatory">
                        <label for="addName" class="form-label">Nama</label>
                        <input type="text" name="addName" id="addName" class="form-control" data-parsley-required="true" autofocus value="{{ old('addName') }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12 mandatory">
                        <label for="addEmail" class="form-label">Email Aktif</label>
                        <input type="email" name="addEmail" id="addEmail" class="form-control" data-parsley-required="true" value="{{ old('addEmail') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 col-sm-12 mandatory">
                        <label for="addRole" class="form-label">Peran</label>
                        <select name="addRole" id="addRole" class="form-select" data-parsley-required="true">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-12 mandatory">
                        <label for="addPassword" class="form-label">Kata Sandi</label>
                        <input type="password" name="addPassword" id="addPassword" class="form-control" data-parsley-minlength="6" data-parsley-required="true">
                    </div>
                    <div class="form-group col-md-4 col-sm-12 mandatory">
                        <label for="addPassConfirm" class="form-label">Ulangi Kata Sandi</label>
                        <input type="password" name="addPassConfirm" id="addPassConfirm" class="form-control" data-parsley-minlength="6" data-parsley-required="true" data-parsley-equalto="#addPassword">
                    </div>
                </div>

                <div class="d-flex mt-3">
                    <a href="{{ route('admin.users_index') }}" class="btn btn-danger me-2">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

