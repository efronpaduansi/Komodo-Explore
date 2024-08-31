@extends('website.layouts.weblayout')

@section('title')
    Hotel
@endsection

@section('content')
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Hotel</h6>
            <h1>Explore Top Hotel</h1>
        </div>
        <div class="row">
            @foreach ($hotels as $hotel)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ $hotel->image_path }}" alt="">
                        <a class="text-decoration-none" href="">
                        <h5 class="">{{ $hotel->name }}</h5>
                            <span>{{ $hotel->description }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
