<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="{{ route('web.homepage') }}" class="navbar-brand">
                <h1 class="m-0 text-primary">{{ $setting->company_name }}</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{ route('web.package') }}" class="nav-item nav-link {{ request()->is('packages') || request()->is('packages/*') ? 'active' : '' }}">Paket Wisata</a>
                    <a href="{{ route('web.destionation') }}" class="nav-item nav-link {{ request()->is('destinations') ? 'active' : '' }}">Destinasi Wisata</a>
                    <a href="{{ route('web.hotels') }}" class="nav-item nav-link {{ request()->is('hotels') ? 'active' : '' }}">Hotel</a>
                    <a href="{{ route('web.restaurants') }}" class="nav-item nav-link {{ request()->is('restaurants') ? 'active' : '' }}">Restoran</a>
                    <a href="{{ route('web.about') }}" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">Tentang</a>
{{--                    <a href="{{ route('web.contact') }}" class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Kontak</a>--}}
                    <a href="{{ route('web.login') }}" class="nav-item nav-link"><i class="fas fa-user-alt"></i></a>
                </div>
            </div>
        </nav>
    </div>
</div>
