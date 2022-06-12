@extends('layouts.admin')

@section('content')
<div class="section-header d-flex justify-content-start">
    <a href="{{ route('data-sub-kategori.index') }}" class="btn btn-info btn-sm mr-2">Kembali</a>
    <h1>Data Sub Kategori</h1>
</div>
<form action="{{ route('data-sub-kategori.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kategori_kode">Nama Kategori</label>
                        <select name="kategori_kode" id="kategori_kode" class="form-control @error('kategori_kode') is-invalid @enderror">
                            <option value="" hidden>-- Pilih Kategori --</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->kode }}" @if (old('kategori_kode') == $item->kode)
                                    selected
                                @endif>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('kode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode Sub Kategori</label>
                        <input type="number" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" placeholder="Masukkan Kode Sub Kategori" value="{{ old('kode') }}" min="01" step="1" >
                        @error('kode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Sub Kategori</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Sub Kategori" value="{{ old('nama') }}">
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
