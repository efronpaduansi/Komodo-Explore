<div class="container-fluid bg-light pt-3 d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <p><i class="fa fa-envelope mr-2"></i>{{ $setting->email }}</p>
                    <p class="text-body px-3">|</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>{{ $setting->phone }}</p>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-primary px-3" href="{{ $setting->facebook }}" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-primary px-3" href="{{ $setting->twitter }}" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
{{--                    <a class="text-primary px-3" href="">--}}
{{--                        <i class="fab fa-linkedin-in"></i>--}}
{{--                    </a>--}}
                    <a class="text-primary px-3" href="{{ $setting->instagram }}" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-primary pl-3" href="{{ $setting->youtube }}" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
