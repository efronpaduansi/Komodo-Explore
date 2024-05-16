@extends('website.layouts.weblayout')

@section('title')
    Beranda
@endsection

@section('content')
     <!-- Carousel Start -->
     @include('website.layouts.components.carousel')
     <!-- Carousel End -->
 
 
     <!-- Booking Start -->
     @include('website.layouts.components.booking_start')
     <!-- Booking End -->
 
 
     <!-- About Start -->
     @include('website.layouts.components.about')
     <!-- About End -->
 
 
     <!-- Feature Start -->
     @include('website.layouts.components.feature')
     <!-- Feature End -->
 
 
     <!-- Destination Start -->
     @include('website.layouts.components.destination')
     <!-- Destination Start -->
 
 
     <!-- Service Start -->
     @include('website.layouts.components.service')
     
     <!-- Service End -->
 
 
     <!-- Packages Start -->
     @include('website.layouts.components.package')
     
     <!-- Packages End -->
 
 
     <!-- Registration Start -->
     @include('website.layouts.components.registration')
     
     <!-- Registration End -->
@endsection