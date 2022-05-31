<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UPTD MUSEUM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('includes.frontend.style')

    @stack('addon-style')

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    @include('includes.frontend.navbar')


    @yield('content')


    @include('includes.frontend.footer')

    @include('includes.frontend.script')

    @stack('addon-script')
</body>
</html>
