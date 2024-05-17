@extends('adminpanel.layouts.app')

@section('title')
    Pengaturan Web
@endsection

@section('page-heading')
    Pengaturan Web
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <!-- List group navigation start -->
            <section class="list-group-navigation">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <div class="list-group" role="tablist">
                                                <a class="list-group-item list-group-item-action active" id="list-home-list"
                                                   data-bs-toggle="list" href="#list-home" role="tab">Tentang</a>

{{--                                                <a class="list-group-item list-group-item-action" id="list-messages-list"--}}
{{--                                                   data-bs-toggle="list" href="#list-messages" role="tab">Messages</a>--}}
{{--                                                <a class="list-group-item list-group-item-action" id="list-settings-list"--}}
{{--                                                   data-bs-toggle="list" href="#list-settings" role="tab">Settings</a>--}}
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-8 mt-1">
                                            <div class="tab-content text-justify" id="nav-tabContent">
                                                <div class="tab-pane show active" id="list-home" role="tabpanel"
                                                     aria-labelledby="list-home-list">
                                                    <form action="{{ route('admin.settings_update') }}" method="post" data-parsley-validate>
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id" value="{{ $setting->id }}">
                                                        <div class="form-group mandatory">
                                                            <label for="company_name" class="form-label">Nama Perusahaan</label>
                                                            <input type="text" name="company_name" id="company_name" class="form-control" data-parsley-required="true" autofocus value="{{ old('about_h1', $setting->company_name) }}">
                                                        </div>
                                                        <div class="form-group mandatory">
                                                            <label for="about_tag" class="form-label">Judul</label>
                                                            <input type="text" name="about_tag" id="about_tag" class="form-control" data-parsley-required="true" autofocus value="{{ old('about_tag', $setting->about_tag) }}">
                                                        </div>
                                                        <div class="form-group mandatory">
                                                            <label for="about_text" class="form-label">Deskripsi</label>
                                                            <textarea name="about_text" id="about_text" cols="30"
                                                                      rows="10" class="form-control" data-parsley-required="true">
                                                                {{ old('about_text', $setting->about_text) }}
                                                            </textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email" data-parsley-type="email" value="{{ old('email', $setting->email) }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone" class="form-label">Telepon</label>
                                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Masukan Telepon" data-parsley-type="number" value="{{ old('phone', $setting->phone) }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="facebook" class="form-label">Facebook</label>
                                                            <input type="text" name="facebook" id="facebook" class="form-control" data-parsley-type="url" value="{{ old('facebook', $setting->facebook) }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="instagram" class="form-label">Instagram</label>
                                                            <input type="text" name="instagram" id="instagram" class="form-control" data-parsley-type="url" value="{{ old('instagram', $setting->instagram) }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="twitter" class="form-label">Twitter</label>
                                                            <input type="text" name="twitter" id="twitter" class="form-control" data-parsley-type="url" value="{{ old('twitter', $setting->twitter) }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="youtube" class="form-label">Youtube</label>
                                                            <input type="text" name="youtube" id="youtube" class="form-control" data-parsley-type="url" value="{{ old('youtube', $setting->youtube) }}">
                                                        </div>

                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- List group navigation ends -->
        </div>
    </div>
@endsection
