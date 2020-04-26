<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.__head')
</head>

<body data-sidebar="dark">
    <div id="app">
        <div id="layout-wrapper">
            @include('layouts.partials.__header')
            @include('layouts.partials.__sidebar')
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                @include('layouts.partials.__footer')
            </div>
        </div>
    </div>
    @include('layouts.partials.__script')
</body>

</html>