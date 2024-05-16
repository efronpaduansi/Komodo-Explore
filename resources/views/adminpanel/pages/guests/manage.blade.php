@extends('adminpanel.layouts.app')

@section('title')
    Pengunjung
@endsection

@section('page-heading')
    Data Pengunjung
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Kewarganegaraan</th>
                                <th>Jenis Kelamin</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($guests as $guest)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('admin.guests_show', $guest->id) }}">{{ $guest->fullname }}</a>
                                    </td>
                                    <td>{{ $guest->email }}</td>
                                    <td>{{ $guest->phone }}</td>
                                    <td>{{ $guest->address }}</td>
                                    <td>{{ $guest->country }}</td>
                                    <td>{{ $guest->gender }}</td>

                                    <td>
                                        <form action="{{ route('admin.guests_destroy', $guest->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')"><i class="far fa-trash-alt"></i></button>
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
