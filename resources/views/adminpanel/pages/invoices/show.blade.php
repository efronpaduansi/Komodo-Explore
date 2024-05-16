@extends('adminpanel.layouts.app')

@section('title')
    Faktur {{ $invoice->number }}
@endsection

@section('page-heading')
    Faktur #{{ $invoice->number }}
@endsection

@section('content')

    @if($invoice->status == 'Unpaid')
        <div class="card">
            <div class="card-body">
                <p>
                    <a class="btn btn-outline-success" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Pembayaran
                    </a>
                </p>
                <div class="collapse" id="collapseExample">
                    <form action="{{ route('admin.invoices_update', $invoice->number) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="invoices_id" value="{{ $invoice->id}}">
                        <input type="hidden" name="guests_id" value="{{ $invoice->guest->id }}">
                        <input type="hidden" name="bookings_id" value="{{ $invoice->booking->id }}">
                        <input type="hidden" name="total_price" value="{{ $invoice->total }}">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="payment_date" class="form-label">Tanggal</label>
                                <input type="date" name="payment_date" id="payment_date" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="payment_channels_id" class="form-label">Chanel Pembayaran</label>
                                @php
                                    $channels = \App\Models\PaymentChannel::where('status', 'active')->get();
                                @endphp
                                <select name="payment_channels_id" id="payment_channels_id" class="form-select" required>
                                    @foreach($channels as $channel)
                                        <option value="{{ $channel->id }}">{{ $channel->bank_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row">
                <h5>Komodo Explore</h5>
                <hr>
                <div class="col-6">
                    <h6>No. Faktur: {{ $invoice->number }}</h6>
                    <p>Tanggal: {{ date('d/m/Y', strtotime($invoice->date)) }}</p>
                </div>
                <div class="col-6 text-end">
                    <h6>Status: <span class="{{ $invoice->status == 'Unpaid' ? 'text-danger' : 'text-success' }}">{{ $invoice->status == 'Unpaid' ? 'Belum Bayar' : 'Lunas' }}</span> </h6>
                    <p>Nama: {{ $invoice->guest->fullname }}</p>
                    <p>Email: {{ $invoice->guest->email }}</p>
                </div>
            </div>
            <hr>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Paket  Wisata</th>
                    <th>Harga (Rp.)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $invoice->booking->packages->package_name}}</td>
                    <td>Rp.{{ number_format($invoice->booking->packages->price, 0, '.', '.')}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('admin.invoices_index') }}" class="btn btn-secondary">Kembali</a>
@endsection
