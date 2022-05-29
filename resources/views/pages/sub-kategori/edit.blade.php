@extends('layouts.admin')

@section('content')
<div class="section-header d-flex justify-content-start">
    <a href="{{ route('data-sub-kategori.index') }}" class="btn btn-info btn-sm mr-2">Kembali</a>
    <h1>Data Sub Kategori</h1>
</div>
<form action="{{ route('data-sub-kategori.update', $item->kode) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kategori_kode">Nama Kategori</label>
                        <select name="kategori_kode" id="kategori_kode" class="form-control @error('kategori_kode') is-invalid @enderror">
                            <option value="" hidden>-- Pilih Kategori --</option>
                            @foreach ($items as $item2)
                                <option value="{{ $item2->kode }}"
                                    @if (old('kategori_kode', $item->kategori_kode) == $item2->kode)
                                        selected
                                    @endif>{{ $item2->nama }}</option>
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
                        <input type="number" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" placeholder="Masukkan Kode Sub Kategori" value="{{ old('kode', $item->kode) }}" min="01" step="1" onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;">
                        @error('kode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Sub Kategori</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Sub Kategori" value="{{ old('nama', $item->nama) }}">
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
