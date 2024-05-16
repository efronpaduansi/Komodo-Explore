@extends('adminpanel.layouts.app')

@section('title')
    Detail Lokasi
@endsection

@section('page-heading')
    Detail "{{ $location->location_name }}"
@endsection

@section('content')
<div class="card" style="width: 100%;">
    <img src="{{ $location->thumbnail }}" class="card-img-top" alt="thumbnail">
    <div class="card-body">
      <h5 class="card-title">{{ $location->location_name }} <span class="{{ $location->status === 'active' ? 'badge bg-success' : 'badge bg-danger' }} text-capitalize">{{ $location->status }}</span></h5>
      <p class="card-text">{{ $location->description }}</p>
      <div class="d-flex">
          <a href="{{ route('admin.locations_index') }}" class="btn btn-danger me-2">Kembali</a>
          <a href="{{ route('admin.locations_edit', $location->id) }}" class="btn btn-secondary">Edit</a>
      </div>
    </div>
  </div>
@endsection