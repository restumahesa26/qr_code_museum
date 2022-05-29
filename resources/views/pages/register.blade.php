<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; Stisla</title>

    @include('includes.style')
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="{{ url('logo.png') }}" alt="logo" width="100" class="">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li class="text-danger">{{ $item }}</li>
                                @endforeach
                            </ul>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input id="nama" type="text" class="form-control" name="nama" required value="{{ old('nama') }}">
                                        <div class="invalid-feedback">
                                            Masukkan nama terlebih dahulu
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" required value="{{ old('username') }}">
                                        <div class="invalid-feedback">
                                            Masukkan username terlebih dahulu
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" required value="{{ old('email') }}">
                                        <div class="invalid-feedback">
                                            Masukkan email terlebih dahulu
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength"
                                                data-indicator="pwindicator" name="password" required>
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                            <div class="invalid-feedback">
                                                Masukkan password terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Password Confirmation</label>
                                            <input id="password2" type="password" class="form-control"
                                                name="password_confirmation" required>
                                            <div class="invalid-feedback">
                                                Masukkan konfirmasi password terlebih dahulu
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                                            <label class="custom-control-label" for="agree">I agree with the terms and
                                                conditions</label>
                                            <div class="invalid-feedback">
                                                Centang ini terlebih dahulu
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('includes.script')
</body>

</html>
