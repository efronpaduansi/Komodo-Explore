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
                                    <th>No. Transaksi</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Nama Pemesan</th>
                                    <th>Paket Wisata</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myBooking as $book)
                                    <tr>
                                       <td>{{ $book->number }} <br>
                                           @if($book->status === 'Confirmed')
                                           <a href="{{ route('user.package_booking_ticket_download', $book->number) }}"><i class="fas fa-file-download"></i> Unduh Tiket</a>
                                           @endif
                                       </td>
                                       <td>{{ date('d-m-Y', strtotime($book->date ))}}</td>
                                        <td>{{ $book->guests->fullname }}</td>
                                        <td>{{ $book->packages->package_name }}</td>
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
                    <p>
                        {{ Auth::user()->email }}
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
