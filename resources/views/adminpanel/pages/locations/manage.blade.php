@extends('adminpanel.layouts.app')

@section('title')
    Lokasi
@endsection

@section('page-heading')
    Data Lokasi
@endsection

@section('content')
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.locations_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Lokasi Baru</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Lokasi</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($locations as $location)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $location->location_name }}</td>
                                    <td class="text-capitalize">
                                        <span class="{{ $location->status === 'active' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $location->status }}</span>
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.locations_show', $location->id) }}" class="btn btn-sm btn-success"><i class="far fa-eye"></i></a>
                                        <a href="{{ route('admin.locations_edit', $location->id) }}" class="btn btn-sm btn-secondary mx-2"><i class="far fa-edit"></i></a>
                                        <form action="{{ route('admin.locations_destroy', $location->id) }}" method="post">
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
