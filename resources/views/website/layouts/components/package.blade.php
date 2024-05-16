<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
            <h1>Pefect Tour Packages</h1>
        </div>
        <div class="row">
            @foreach ($packages as $package)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="{{ $package->thumbnail }}" alt="thumbnail" height="50%" width="100%">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Labuan Bajo</small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $package->duration }}</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>{{ $package->participant }} Peserta</small>
                            </div><span class="font-weight-bold">
                                <a href="{{ route('web.package_show', $package->slug) }}">{{ $package->package_name }}</a>
                            </span></a>
                            <p>{{ $package->description }}</p>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">{{ "Rp." . number_format($package->price, 0, '.', '.') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <a href="{{ route('web.package_show', $package->slug) }}" class="btn btn-primary rounded-pill">Selengkapnya</a>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
