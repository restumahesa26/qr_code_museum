@extends('layouts.home')

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="position-relative">
        <img class="img-fluid" src="{{ url('frontend/img/carousel-1.jpg') }}" alt="" style="width: 100%;">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-sm-10 col-lg-8">
                        <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                        <h1 class="display-3 text-white animated slideInDown">The Best Online Learning Platform</h1>
                        <p class="fs-5 text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elitr.</p>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                        <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ url('frontend/img/about.jpg') }}" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                <h1 class="mb-4">Welcome to Museum Negeri Bengkulu</h1>
                <p class="mb-4">Museum Negeri Bengkulu didirikan pada tanggal 1 April 1978, mulai berfungsi sebagai museum pada tanggal 3 Mei 1980
                    menempati lokasi sementara di belakang benteng Marlborough. Koleksi awal berjumlah 51 koleksi dengan rincian 43 buah koleksi Etnografi,
                     6 buah koleksi Keramik, dan 2 buah koleksi replika. </p>
                <p class="mb-4">Sejak tanggal 3 Januari 1983 museum pindah ke lokasi baru di jalan Pembangunan No. 08 Padang Harapan Bengkulu.
                     Berdasarkan SK Mendikbud RI No.0754/0/1987, ditingkatkan statusnya menjadi Museum Negeri Provinsi dengan klasifikasi museum umum tipe C,
                      sebagai unit pelaksana teknis (UPT) di bawah Direktorat Permuseuman Dirjen Kebudayaan Departemen Pendidikan dan Kebudayaan Republik Indonesia.
                       Peresmian dilaksanakan pada tanggal 31 Maret 1988 oleh Direktur Jenderal Kebudayaan G.B.P.H. Poeger, Drs. dengan nama Museum Negeri Provinsi Bengkulu.</p>
                <div class="row gy-2 gx-4 mb-4">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">Pengunjung</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            @foreach ($items as $item)
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ url('frontend/img/testimonial-2.jpg') }}" style="width: 80px; height: 80px;">
                <h5 class="mb-0">{{ $item->nama }}</h5>
                <p>Pengunjung Museum</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">{{ $item->pesan }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('css/sweetalert2.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    @if(session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session()->get("success") }}'
            })
        </script>
    @endif
@endpush
