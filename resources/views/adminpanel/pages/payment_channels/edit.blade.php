@extends('adminpanel.layouts.app')

@section('title')
    Edit Channel Bank
@endsection

@section('page-heading')
    Edit Channel Bank
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <img src="{{ $channel->logo }}" alt="bank logo" width="70" height="70">
        </div>
        <div class="card-body">
            <form action="{{ route('admin.payment_channels_update', $channel->id) }}" method="post" enctype="multipart/form-data" data-parsley-validate>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control" accept=".png,.jpeg,.jpg">
                        <small class="text-muted font-italic">Kosongkan jika tidak ingin mengubah gambar. Ekstensi yang diperbolehkan: PNG,JPG,JPEG. Max:512KB. </small>
                    </div>

                    <div class="form-group col-md-6 mandatory">
                        <label for="bank_name" class="form-label">Nama Bank</label>
                        <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Cth: BCA" data-parsley-required="true" value="{{ $channel->bank_name  }}">
                    </div>

                    <div class="form-group col-md-6 mandatory">
                        <label for="bank_number" class="form-label">No. Rekening</label>
                        <input type="text" name="bank_number" id="bank_number" class="form-control" placeholder="Cth: BCA" data-parsley-required="true" data-parsley-type="number" value="{{ $channel->bank_number  }}">
                    </div>

                    <div class="form-group col-md-6 mandatory">
                        <label for="name" class="form-label">Nama Pemilik Rekening</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Pemilik Rekening" data-parsley-required="true" value="{{ $channel->name }}">
                    </div>

                    <div class="form-group col-md-6 mandatory">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="active">Akfif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>

                </div>
                <div class="d-flex">
                    <a href="{{ route('admin.payment_channels_index') }}" class="btn btn-danger me-2">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

