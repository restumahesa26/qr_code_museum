@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-book"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Kategori</h4>
                </div>
                <div class="card-body">
                    {{ $kategori }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Sub Kategori</h4>
                </div>
                <div class="card-body">
                    {{ $sub_kategori }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-folder"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Koleksi</h4>
                </div>
                <div class="card-body">
                    {{ $koleksi }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-smile"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Tanggapan</h4>
                </div>
                <div class="card-body">
                    {{ $tanggapan }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    @foreach ($allKategori as $item)
    <div class="col-lg-2">
        <div class="card card-statistic-1">
            <div class="card-wrap pb-3">
                <div class="card-header">
                    <h4>{{ $item->nama }}</h4>
                </div>
                <div class="card-body">
                    {{ App\Helpers\MyHelper::getKategoriCount($item->kode) }}
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
