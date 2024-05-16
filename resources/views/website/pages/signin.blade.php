@extends('website.layouts.weblayout')

@section('title')
    Login
@endsection

@section('content')

<div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Login</h6>
                    <h1 class="text-white"> Masuk ke Akun Anda</h1>
                </div>
                <p class="text-white">Silahkan login untuk melanjutkan.</p>
            </div>
            <div class="col-lg-5">
                <div class="card border-0">
                    <div class="card-header bg-primary text-center p-4">
                        <h1 class="text-white m-0">Sign In</h1>
                    </div>
                    <div class="card-body rounded-bottom bg-white p-5">
                        <form action="{{ route('web.authenticate') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <input type="email" name="email" class="form-control p-4" placeholder="Email Aktif" required="required" value="{{ old('email') }}"/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control p-4" placeholder="Password" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block py-3" type="submit">Masuk</button>
                            </div>
                            <br>
                            <small>Belum punya akun? <a href="{{ route('web.register') }}">Buat Akun!</a></small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
