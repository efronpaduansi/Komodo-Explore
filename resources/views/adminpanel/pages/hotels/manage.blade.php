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
                                <th>Harga</th>
                                <th>Waktu Checkin</th>
                                <th>Waktu Checkout</th>
                                <th>Alamat Lengkap</th>
                                <th>Kota</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Website</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
