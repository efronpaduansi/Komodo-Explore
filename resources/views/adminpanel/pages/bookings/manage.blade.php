@extends('adminpanel.layouts.app')

@section('title')
    Pemesanan
@endsection

@section('page-heading')
    Data Pemesanan
@endsection

@section('content')
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>No. Booking</th>
                            <th>Nama Pemesan</th>
                            <th>Paket Wisata</th>
                            <th>Total Peserta</th>
                            <th>Tgl Keberangkatan</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date('d-m-Y, H;i:s', strtotime($book->created_at)) }}</td>
                                    <td>
                                        <a href="">{{ $book->number }}</a>
                                    </td>
                                    <td>{{ $book->guests->fullname }}</td>
                                    <td>{{ $book->packages->package_name }}</td>
                                    <td>{{ $book->participant_count . " Orang" }}</td>
                                    <td>{{ date('d-m-Y', strtotime($book->date)) }}</td>
                                    <td>
                                        <span class="{{ $book->status === 'Waiting for Confirmation' ? 'font-weight-bold' : '' }}">{{ $book->status }}</span>
                                        @if($book->status === 'Waiting for Confirmation')
                                            <br>
                                            <a href="{{ route('admin.bookings_confirmed', $book->id) }}" onclick="return confirm('Konfirmasi Pesanan?')"><span class="text-center font-weight-bold text-success"><i class="fas fa-check-circle"></i> Konfirmasi</span></a> |
                                            <a href="{{ route('admin.bookings_cancelled', $book->id) }}" onclick="return confirm('Batalkan pesanan?')">
                                                <span class="text-center font-weight-bold text-danger"><i class="far fa-times-circle"></i> Batalkan</span>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.bookings_destroy', $book->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Hapus pesanan ini?')" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
