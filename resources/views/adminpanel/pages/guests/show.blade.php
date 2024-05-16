@extends('adminpanel.layouts.app')

@section('title')
    {{ $guest->fullname }}
@endsection

@section('page-heading')
    Data Pengunjung "{{ $guest->fullname }}"
@endsection


@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Foto Profil</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div class="avatar avatar-2xl">
                            <img src="{{ asset('mazer/compiled/jpg/2.jpg') }}" alt="Avatar">
                        </div>

                        <h3 class="mt-3">{{ $guest->fullname }}</h3>
                        <p class="text-small">{{ $guest->email }}</p>

                        <div class="d-inline">
                            <a href="{{ route('admin.guests_index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Biodata</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $guest->fullname }}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{ $guest->email }}</td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>{{ $guest->phone }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $guest->address }}</td>
                        </tr>
                        <tr>
                            <th>Negara</th>
                            <td>{{ $guest->country }}</td>
                        </tr>
                        <tr>
                            <th>Tgl. Lahir</th>
                            <td>{{ date('d-m-Y', strtotime($guest->dateofbirth))}}</td>
                        </tr>
                        <tr>
                            <th>Bergabung pada</th>
                            <td>{{ $guest->created_at->diffForHumans()}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
@endsection