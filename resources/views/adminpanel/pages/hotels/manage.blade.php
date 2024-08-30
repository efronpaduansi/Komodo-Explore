@extends('adminpanel.layouts.app')

@section('title')
    Hotel
@endsection

@section('page-heading')
    Data Hotel
@endsection

@section('content')
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.hotels_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Hotel Baru</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hotel</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Waktu Checkin</th>
                                <th>Waktu Checkout</th>
                                <th>Alamat Lengkap</th>
                                <th>Kota</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Website</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotels as $hotel)
                                <tr>
                                    <td>{{ $hotel->id }}</td>
                                    <td>{{ $hotel->name }}</td>
                                    <td>{{ $hotel->description }}</td>
                                    <td>{{ $hotel->price }}</td>
                                    <td>{{ $hotel->checkin_time }}</td>
                                    <td>{{ $hotel->checkout_time }}</td>
                                    <td>{{ $hotel->address }}</td>
                                    <td>{{ $hotel->city }}</td>
                                    <td>{{ $hotel->email }}</td>
                                    <td>{{ $hotel->phone }}</td>
                                    <td>{{ $hotel->website }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.hotels_edit', $hotel->id) }}" class="btn btn-sm btn-secondary me-2"><i class="far fa-edit"></i></a>
                                            <form action="{{ route('admin.hotels_destroy', $hotel->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </div>
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
