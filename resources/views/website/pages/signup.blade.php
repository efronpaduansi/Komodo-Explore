@extends('website.layouts.weblayout')

@section('title')
    Buat Akun
@endsection

@section('content')

<div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Register</h6>
                    <h1 class="text-white"> Buat Akun Anda</h1>
                </div>
                <p class="text-white">Isikan data Anda untuk memulai membuat akun.</p>
            </div>
            <div class="col-lg-5">
                <div class="card border-0">
                    <div class="card-header bg-primary text-center p-4">
                        <h1 class="text-white m-0">Sign Up</h1>
                    </div>
                    <div class="card-body rounded-bottom bg-white p-5">
                        <form action="{{ route('web.auth_store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <input type="text" name="fullname" class="form-control p-4" placeholder="Nama" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control p-4" placeholder="Email Aktif" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control p-4" placeholder="No. Telepon" required="required" />
                            </div>
                            <div class="form-group">
                                <select class="custom-select px-4" style="height: 47px;" name="gender">
                                    <option selected>Jenis Kelamin</option>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control p-4" placeholder="Password" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control p-4" placeholder="Konfirmasi Password" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block py-3" type="submit">Buat Akun</button>
                            </div>
                            <br>
                            <small>Sudah punya akun? <a href="{{ route('web.login') }}">Login!</a></small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
