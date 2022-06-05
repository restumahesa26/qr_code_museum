@extends('layouts.admin')

@section('content')
<div class="section-header d-flex justify-content-start">
    <a href="{{ route('data-kategori.index') }}" class="btn btn-info btn-sm mr-2">Kembali</a>
    <h1>Data Kategori</h1>
</div>
<form action="{{ route('data-kategori.update', $item->kode) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kode">Kode Kategori</label>
                        <input type="number" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" placeholder="Masukkan Kode Kategori" value="{{ old('kode', $item->kode) }}" min="01" step="1" onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;">
                        @error('kode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Kategori" value="{{ old('nama', $item->nama) }}">
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Kategori</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" placeholder="Masukkan Foto Kategori" value="{{ old('foto') }}" onchange="preview_image();">
                        @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div id="image_preview" class="mt-3"></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('addon-script')
<script>
    function preview_image() {
        var total_file=document.getElementById("foto").files.length;
        $('#image_preview').html("");
        for(var i=0;i<total_file;i++) {
            $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' style='width: 800px;'><br>");
        }
    }
</script>
@endpush
