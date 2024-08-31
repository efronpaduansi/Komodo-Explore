@extends('adminpanel.layouts.app')

@section('title')
    Restaurant
@endsection

@section('page-heading')
    Data Restaurant
@endsection

@section('content')
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.restaurants_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Baru</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Restoran</th>
                                <th>Deskripsi</th>
                                <th>Alamat Lengkap</th>
                                <th>Kota</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Jam Buka</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restaurants as $resto)
                                <tr>
                                    <td>{{ $resto->id }}</td>
                                    <td>{{ $resto->name }}</td>
                                    <td>{{ $resto->description }}</td>
                                    <td>{{ $resto->address }}</td>
                                    <td>{{ $resto->city }}</td>
                                    <td>{{ $resto->email }}</td>
                                    <td>{{ $resto->phone }}</td>
                                    <td>{{ $resto->opening_hours }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.hotels_edit', $resto->id) }}" class="btn btn-sm btn-secondary me-2"><i class="far fa-edit"></i></a>
                                            <form action="{{ route('admin.hotels_destroy', $resto->id) }}" method="post">
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
