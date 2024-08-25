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
                <a href="{{ route('admin.locations_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Hotel Baru</a>
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
