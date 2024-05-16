@extends('adminpanel.layouts.app')

@section('title')
    Data Faktur
@endsection

@section('page-heading')
    Data Faktur
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Paket Wisata</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $inv)
                            <tr>
                                <td>{{ $inv->number }}</td>
                                <td>{{ date('d-m-Y', strtotime($inv->date)) }}</td>
                                <td>{{ $inv->guest->fullname }}</td>
                                <td>{{ $inv->booking->packages->package_name }}</td>
                                <td>Rp.{{ number_format($inv->total, 0, '.', '.') }}</td>
                                <td class="{{ $inv->status == 'Unpaid' ? 'text-danger' : 'text-success' }}">{{ $inv->status == 'Paid' ? 'Lunas' : 'Belum Bayar' }}</td>
                                <td>
                                    <a href="{{ route('admin.invoices_show', $inv->number) }}" class="btn btn-sm btn-secondary">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
