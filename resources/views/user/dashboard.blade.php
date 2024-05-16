@extends('website.layouts.weblayout')

@section('title')
    Dashboard
@endsection

@section('content')

   <!-- Blog Start -->
   <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Transactions table Start -->
                <div class="bg-white mb-3" style="padding: 30px;">
                    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Riwayat Transaksi</h4>
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pemesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myBooking as $book)
                                    <tr>
                                       <td>{{ $book->number }}</td>
                                       <td>{{ date('d-m-Y', strtotime($book->date ))}}</td>
                                        <td>{{ $book->guests->fullname }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Transactions table End -->
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Author Bio -->
                <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4">
                    <img src="{{ asset('travel/img/user.jpg') }}" class="img-fluid mx-auto mb-3" style="width: 100px;">
                    <h3 class="text-primary mb-3">Hi, {{ Auth::user()->name }}</h3>
                    <p>Conset elitr erat vero dolor ipsum et diam, eos dolor lorem, ipsum sit no ut est  ipsum erat kasd amet elitr</p>
                    <div class="d-flex justify-content-center">
                        <a class="text-primary px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary px-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
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
