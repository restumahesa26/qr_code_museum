@extends('layouts.home')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
            <h1 class="mb-5">Kontak</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form action="{{ route('send-testimoni') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <h4>Ulasan</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="name" placeholder="Nama" required name="nama" value="{{ old('nama') }}">
                                <label for="name">Nama</label>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="No HP" placeholder="No HP" required name="no_telepon" value="{{ old('no_telepon') }}">
                                <label for="subject">No HP</label>
                                @error('no_telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required name="email" value="{{ old('email') }}">
                                <label for="email">Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control @error('pesan') is-invalid @enderror" placeholder="Tinggalkan Testimoni" id="pesan" style="height: 150px" required name="pesan">{{ old('pesan') }}</textarea>
                                <label for="pesan">Pesan</label>
                                @error('pesan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Kirim Ulasan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <iframe class="position-relative rounded w-100 h-100"
                    src="https://maps.google.com/maps?q=museum%20bengkulu&t=&z=17&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <p  style="text-align: justify;" class="mb-4">Terimakasih telah menggunakan aplikasi Scan Qr-Code Museum Negeri Kota Bengkulu, Ulasan yang anda berikan akan sangat bermanfaat dan membantu kami dalam melakukan pengembangan aplikasi Scan Qr-Code Museum Bengkulu.</p>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Museum Negeri Bengkulu</h5>
                        <p class="mb-0">Jl. Pembangunan No. 08, Gading Cempaka</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">No Handphone</h5>
                        <p class="mb-0"> (0736) 21620</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Email</h5>
                        <p class="mb-0">dikbud.bengkuluprov@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
