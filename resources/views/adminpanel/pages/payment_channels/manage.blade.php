@extends('adminpanel.layouts.app')

@section('title')
    Channel Bank Pembayaran
@endsection

@section('page-heading')
    Channel Bank Pembayaran
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.payment_channels_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Channel Baru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Nama Bank</th>
                        <th>No. Rekening</th>
                        <th>Pemilik Rekening</th>
                        <th>Status</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($channels as $channel)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $channel->logo }}" alt="bank logo" width="70" height="70">
                                </td>
                                <td>{{ $channel->bank_name }}</td>
                                <td>{{ $channel->bank_number }}</td>
                                <td>{{ $channel->name }}</td>
                                <td class="text-capitalize"><span class="{{ $channel->status == 'active' ? 'badge bg-success' : 'badge bg-danger' }}">
                                        {{ $channel->status }}
                                    </span>
                                    <br>
                                    @if($channel->status != 'active')
                                        <small><a href="{{ route('admin.payment_channels_doActive', $channel->id) }}" class="text-success" onclick="return confirm('Aktifkan channel pembayaran ini?')">Aktifkan</a></small>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.payment_channels_edit', $channel->id) }}" class="btn btn-sm btn-secondary me02"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('admin.payment_channels_destroy', $channel->id) }}" method="post">
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
