<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="{{ url('logo.png') }}" />
    <title>UPTD MUSEUM</title>

    @include('includes.style')

    @stack('addon-style')

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('includes.navbar')

            @include('includes.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    @yield('content')

                </section>
            </div>

            @include('includes.footer')

        </div>
    </div>

    @include('includes.script')

    @stack('addon-script')

</body>

</html>
