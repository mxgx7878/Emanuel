<!DOCTYPE html>
<html lang="en">

<head>
    <title>OBS STUDIO</title>
    <meta charset="utf-8">
    @include('admin.layouts.css')
    @include('admin.layouts.extrajs')
   
</head>

<body>
    <div class="d-flex" id="wrapper">


        {{-- <div id="cover">
            <div class="loadingio-spinner-rolling-avt82ldo9vj">
                <div class="ldio-gnrzupa2le8">
                    <div></div>
                </div>
            </div>
        </div> --}}

        @include('admin.layouts.sidebar')
        @include('admin.layouts.topbar')
        @yield('content')
        @include('admin.layouts.footer')
</body>

</html>
