@extends('adminpanel.layouts.app')

@section('title')
    Data Pembayaran
@endsection

@section('page-heading')
    Data Pembayaran
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                    <tr>
                        <th>No. Faktur</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Total</th>
                        <th>Channel Bank</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $pay)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.invoices_show', $pay->invoice->number) }}" >{{ $pay->booking->number }}</a>
                                </td>
                                <td>{{ date('d-m-Y', strtotime($pay->date)) }}</td>
                                <td>{{ $pay->guest->fullname }}</td>
                                <td>Rp.{{ number_format($pay->total_price, 0, ',', '.') }}</td>
                                <td>{{ $pay->channel->bank_name }}</td>
                                <td>
                                    <form action="{{ route('admin.payments_destroy', $pay->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="invoice_id" value="{{ $pay->invoice->id }}">
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
