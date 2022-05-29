@extends('layouts.admin')

@section('content')
<div class="section-header d-flex justify-content-start">
    <a href="{{ route('data-kategori.index') }}" class="btn btn-info btn-sm mr-2">Kembali</a>
    <h1>Data Kategori</h1>
</div>
<form action="{{ route('data-kategori.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kode">Kode Kategori</label>
                        <input type="number" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" placeholder="Masukkan Kode Kategori" value="{{ old('kode') }}" min="01" step="1" onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;">
                        @error('kode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Kategori" value="{{ old('nama') }}">
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
