<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Adminpanel</title>
    @include('adminpanel.layouts.includes.style')
</head>

<body>
<div id="app">
    @include('sweetalert::alert')
    <div id="sidebar">
        <div class="sidebar-wrapper active">
            @include('adminpanel.layouts.components.app_sidebar')
            @include('adminpanel.layouts.components.app_sidebar_menu')
        </div>
    </div>
    <div id="main" class='layout-navbar navbar-fixed'>
        @include('adminpanel.layouts.components.app_header')
        <div id="main-content">

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>@yield('page-heading')</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">@yield('page-heading')</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    @yield('content')
                </section>
            </div>

        </div>
        @include('adminpanel.layouts.components.app_footer')
    </div>
</div>
@include('adminpanel.layouts.includes.script')


</body>

</html>
