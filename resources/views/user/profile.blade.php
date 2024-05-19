@extends('website.layouts.weblayout')

@section('title')
    Profil
@endsection

@section('content')

   <!-- Blog Start -->
   <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Transactions table Start -->
                <div class="bg-white mb-3" style="padding: 30px;">
                    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Profil Saya</h4>
                    <form action="{{ route('user.my_profile_update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required readonly>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <small class="text-muted">* Terakhir diubah: {{ $user->updated_at->diffForHumans() }}</small>
                    </form> 
                </div>
                <!-- Transactions table End -->
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Author Bio -->
                <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4">
                    <img src="{{ asset('travel/img/user.jpg') }}" class="img-fluid mx-auto mb-3" style="width: 100px;">
                    <h3 class="text-primary mb-3">Hi, {{ $user->name }}</h3>
                    <p>
                        {{ $user->email }}
                    </p>
                    <div class="d-flex justify-content-center">
                        <a class="text-primary px-2" href="">
                           Profil Saya
                        </a>
                        {{-- <a class="text-primary px-2" href="">
                           Pengaturan
                        </a> --}}
                    </div>
                    <form action="{{ route('user.logout') }}" method="post">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-primary mt-5">Logout</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection
