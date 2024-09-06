@extends('adminpanel.layouts.app')

@section('title')
    Paket Wisata
@endsection

@section('page-heading')
    Paket Wisata
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.packages_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Paket Baru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Paket</th>
                            <th>Durasi</th>
                            <th>Harga</th>
                            <th>Jml Peserta</th>
                            <th>Hotel</th>
                            <th>Restoran</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('admin.packages_show', $p->id) }}">{{ $p->package_name }}</a>
                                </td>
                                <td>{{ $p->duration }}</td>
                                <td>{{ "Rp." . number_format($p->price, 0, '.', '.') }}</td>
                                <td>{{ $p->participant . " Peserta" }}</td>
                                <td>{{ $p->hotel->name }}</td>
                                <td>{{ $p->resto->name }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.packages_edit', $p->id) }}" class="btn btn-sm btn-secondary mx-2"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('admin.packages_destroy', $p->id) }}" method="post">
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
@endsection
