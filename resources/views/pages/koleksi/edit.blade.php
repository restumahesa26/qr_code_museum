@extends('layouts.admin')

@section('content')
<div class="section-header d-flex justify-content-start">
    <a href="{{ route('data-koleksi.index') }}" class="btn btn-info btn-sm mr-2">Kembali</a>
    <h1>Data Koleksi</h1>
</div>
<form action="{{ route('data-koleksi.update', $item->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nomor_inventaris">Nomor Inventaris Baru</label>
                                <input type="number" class="form-control @error('nomor_inventaris') is-invalid @enderror" id="nomor_inventaris" name="nomor_inventaris" placeholder="Masukkan Nomor Inventaris Baru" value="{{ old('nomor_inventaris', $item->nomor_inventaris) }}" required>
                                @error('nomor_inventaris')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nomor_seri">Nomor Seri</label>
                                <input type="text" class="form-control @error('nomor_seri') is-invalid @enderror" id="nomor_seri" name="nomor_seri" placeholder="Masukkan Nomor Seri" value="{{ old('nomor_seri', $item->nomor_seri) }}">
                                @error('nomor_seri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nomor_koleksi_lama_registrasi">Nomor Koleksi Lama Registrasi</label>
                                <input type="text" class="form-control @error('nomor_koleksi_lama_registrasi') is-invalid @enderror" id="nomor_koleksi_lama_registrasi" name="nomor_koleksi_lama_registrasi" placeholder="Masukkan Nomor Koleksi Lama Registrasi" value="{{ old('nomor_koleksi_lama_registrasi', $item->nomor_koleksi_lama_registrasi) }}">
                                @error('nomor_koleksi_lama_registrasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nomor_koleksi_lama_inventaris">Nomor Koleksi Lama Inventaris</label>
                                <input type="text" class="form-control @error('nomor_koleksi_lama_inventaris') is-invalid @enderror" id="nomor_koleksi_lama_inventaris" name="nomor_koleksi_lama_inventaris" placeholder="Masukkan Nomor Koleksi Lama Inventaris" value="{{ old('nomor_koleksi_lama_inventaris', $item->nomor_koleksi_lama_inventaris) }}">
                                @error('nomor_koleksi_lama_inventaris')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_koleksi">Nama Koleksi</label>
                                <input type="text" class="form-control @error('nama_koleksi') is-invalid @enderror" id="nama_koleksi" name="nama_koleksi" placeholder="Masukkan Nama Koleksi" value="{{ old('nama_koleksi', $item->nama_koleksi) }}" required>
                                @error('nama_koleksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="klasifikasi">Kategori</label>
                                <select name="klasifikasi" id="klasifikasi" class="form-control @error('klasifikasi') is-invalid @enderror" required>
                                    <option value="" hidden>-- Pilih Kategori --</option>
                                    @foreach ($kategori as $item2)
                                        <option value="{{ $item2->kode }}" @if (old('klasifikasi', $item->kategori->kode) == $item2->kode)
                                            selected
                                        @endif>{{ $item2->kode }} - {{ $item2->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sub_klasifikasi">Sub Kategori</label>
                                <select name="sub_klasifikasi" id="sub_klasifikasi" class="form-control @error('sub_klasifikasi') is-invalid @enderror">
                                    <option value="" hidden>-- Pilih Sub Kategori --</option>
                                    {{-- @foreach ($subKategori as $item2)
                                        <option value="{{ $item2->kode }}" @if (old('sub_klasifikasi', $item->sub_klasifikasi) == $item2->kode)
                                            selected
                                        @endif>{{ $item2->kode }} - {{ $item2->nama }}</option>
                                    @endforeach --}}
                                </select>
                                <input type="hidden" value="{{ $item->sub_klasifikasi }}" id="value_sub_klasifikasi">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nomor_penyimpanan">Nomor Penyimpanan</label>
                                <input type="text" class="form-control @error('nomor_penyimpanan') is-invalid @enderror" id="nomor_penyimpanan" name="nomor_penyimpanan" placeholder="Masukkan Nomor Penyimpanan" value="{{ old('nomor_penyimpanan', $item->nomor_penyimpanan) }}" required>
                                @error('nomor_penyimpanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                <input type="text" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" name="tanggal_masuk" placeholder="Masukkan Tanggal Masuk" value="{{ old('tanggal_masuk', $item->tanggal_masuk) }}">
                                @error('tanggal_masuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cara_perolehan">Cara Perolehan</label>
                                <input type="text" class="form-control @error('cara_perolehan') is-invalid @enderror" id="cara_perolehan" name="cara_perolehan" placeholder="Masukkan Cara Perolehan" value="{{ old('cara_perolehan', $item->cara_perolehan) }}" required>
                                @error('cara_perolehan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_perolehan">Tempat Perolehan</label>
                                <input type="text" class="form-control @error('tempat_perolehan') is-invalid @enderror" id="tempat_perolehan" name="tempat_perolehan" placeholder="Masukkan Tempat Perolehan" value="{{ old('tempat_perolehan', $item->tempat_perolehan) }}">
                                @error('tempat_perolehan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kondisi_koleksi">Kondisi Koleksi</label>
                                <input type="text" class="form-control @error('kondisi_koleksi') is-invalid @enderror" id="kondisi_koleksi" name="kondisi_koleksi" placeholder="Masukkan Kondisi Koleksi" value="{{ old('kondisi_koleksi', $item->kondisi_koleksi) }}" required>
                                @error('kondisi_koleksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ciri_khusus">Ciri Khusus / Bentuk</label>
                                <input type="text" class="form-control @error('ciri_khusus') is-invalid @enderror" id="ciri_khusus" name="ciri_khusus" placeholder="Masukkan Ciri Khusus / Bentuk" value="{{ old('ciri_khusus', $item->ciri_khusus) }}">
                                @error('ciri_khusus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bahan">Bahan</label>
                                <input type="text" class="form-control @error('bahan') is-invalid @enderror" id="bahan" name="bahan" placeholder="Masukkan Bahan" value="{{ old('bahan', $item->bahan) }}">
                                @error('bahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="warna">Warna</label>
                                <input type="text" class="form-control @error('warna') is-invalid @enderror" id="warna" name="warna" placeholder="Masukkan Warna" value="{{ old('warna', $item->warna) }}">
                                @error('warna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="motif">Motif</label>
                                <input type="text" class="form-control @error('motif') is-invalid @enderror" id="motif" name="motif" placeholder="Masukkan Motif" value="{{ old('motif', $item->motif) }}">
                                @error('motif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dekorasi">Dekorasi</label>
                                <input type="text" class="form-control @error('dekorasi') is-invalid @enderror" id="dekorasi" name="dekorasi" placeholder="Masukkan Dekorasi" value="{{ old('dekorasi', $item->dekorasi) }}">
                                @error('dekorasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="teknik_pembuatan">Teknik Pembuatan</label>
                                <input type="text" class="form-control @error('teknik_pembuatan') is-invalid @enderror" id="teknik_pembuatan" name="teknik_pembuatan" placeholder="Masukkan Teknik Pembuatan" value="{{ old('teknik_pembuatan', $item->teknik_pembuatan) }}" required>
                                @error('teknik_pembuatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tempat_pembuatan">Tempat Pembuatan</label>
                                <input type="text" class="form-control @error('tempat_pembuatan') is-invalid @enderror" id="tempat_pembuatan" name="tempat_pembuatan" placeholder="Masukkan Tempat Pembuatan" value="{{ old('tempat_pembuatan', $item->tempat_pembuatan) }}">
                                @error('tempat_pembuatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fungsi">Fungsi</label>
                                <input type="text" class="form-control @error('fungsi') is-invalid @enderror" id="fungsi" name="fungsi" placeholder="Masukkan Fungsi" value="{{ old('fungsi', $item->fungsi) }}">
                                @error('fungsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tempat_penyimpanan">Tempat Penyimpanan</label>
                                <input type="text" class="form-control @error('tempat_penyimpanan') is-invalid @enderror" id="tempat_penyimpanan" name="tempat_penyimpanan" placeholder="Masukkan Tempat Penyimpanan" value="{{ old('tempat_penyimpanan', $item->tempat_penyimpanan) }}" required>
                                @error('tempat_penyimpanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_pencatatan">Tanggal Pencatatan</label>
                                <input type="text" class="form-control @error('tanggal_pencatatan') is-invalid @enderror" id="tanggal_pencatatan" name="tanggal_pencatatan" placeholder="Masukkan Tanggal Pencatatan" value="{{ old('tanggal_pencatatan', $item->tanggal_pencatatan) }}">
                                @error('tanggal_pencatatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" value="{{ old('keterangan', $item->keterangan) }}">
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h5 class="text-danger">Khusus Naskah</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul_naskah">Judul Naskah</label>
                                        <input type="text" class="form-control @error('judul_naskah') is-invalid @enderror" id="judul_naskah" name="judul_naskah" placeholder="Masukkan Judul Naskah" value="{{ old('judul_naskah', $item->judul_naskah) }}">
                                        @error('judul_naskah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="iluminasi">Iluminasi</label>
                                        <input type="text" class="form-control @error('iluminasi') is-invalid @enderror" id="iluminasi" name="iluminasi" placeholder="Masukkan Iluminasi" value="{{ old('iluminasi', $item->iluminasi) }}">
                                        @error('iluminasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ukuran_naskah">Ukuran Teks</label>
                                        <input type="text" class="form-control @error('ukuran_naskah') is-invalid @enderror" id="ukuran_naskah" name="ukuran_naskah" placeholder="Masukkan Ukuran Teks" value="{{ old('ukuran_naskah', $item->ukuran_naskah) }}" step="0.001" min="0">
                                        @error('ukuran_naskah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jumlah_halaman">Jumlah Halaman</label>
                                        <input type="text" class="form-control @error('jumlah_halaman') is-invalid @enderror" id="jumlah_halaman" name="jumlah_halaman" placeholder="Masukkan Jumlah Halaman" value="{{ old('jumlah_halaman', $item->jumlah_halaman) }}" min="1">
                                        @error('jumlah_halaman')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jumlah_baris">Jumlah Baris</label>
                                        <input type="text" class="form-control @error('jumlah_baris') is-invalid @enderror" id="jumlah_baris" name="jumlah_baris" placeholder="Masukkan Jumlah Baris" value="{{ old('jumlah_baris', $item->jumlah_baris) }}" min="1">
                                        @error('jumlah_baris')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Ukuran</label>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Item</th>
                                    <th>Panjang</th>
                                    <th>Lebar</th>
                                    <th>Tinggi</th>
                                    <th>Tebal</th>
                                    <th>Diameter</th>
                                </tr>
                                <tr>
                                    <th>Ukuran</th>
                                    <td>
                                        <input type="number" name="panjang_ukuran" id="panjang_ukuran" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('panjang_ukuran', $item->ukuran->panjang_ukuran) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="lebar_ukuran" id="lebar_ukuran" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('lebar_ukuran', $item->ukuran->lebar_ukuran) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tinggi_ukuran" id="tinggi_ukuran" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tinggi_ukuran', $item->ukuran->tinggi_ukuran) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tebal_ukuran" id="tebal_ukuran" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tebal_ukuran', $item->ukuran->tebal_ukuran) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="diameter_ukuran" id="diameter_ukuran" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('diameter_ukuran', $item->ukuran->diameter_ukuran) }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Badan</th>
                                    <td>
                                        <input type="number" name="panjang_badan" id="panjang_badan" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('panjang_badan', $item->ukuran->panjang_badan) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="lebar_badan" id="lebar_badan" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('lebar_badan', $item->ukuran->lebar_badan) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tinggi_badan', $item->ukuran->tinggi_badan) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tebal_badan" id="tebal_badan" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tebal_badan', $item->ukuran->tebal_badan) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="diameter_badan" id="diameter_badan" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('diameter_badan', $item->ukuran->diameter_badan) }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Alas</th>
                                    <td>
                                        <input type="number" name="panjang_alas" id="panjang_alas" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('panjang_alas', $item->ukuran->panjang_alas) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="lebar_alas" id="lebar_alas" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('lebar_alas', $item->ukuran->lebar_alas) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tinggi_alas" id="tinggi_alas" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tinggi_alas', $item->ukuran->tinggi_alas) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tebal_alas" id="tebal_alas" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tebal_alas', $item->ukuran->tebal_alas) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="diameter_alas" id="diameter_alas" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('diameter_alas', $item->ukuran->diameter_alas) }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mulut / Bibir</th>
                                    <td>
                                        <input type="number" name="panjang_mulut" id="panjang_mulut" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('panjang_mulut', $item->ukuran->panjang_mulut) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="lebar_mulut" id="lebar_mulut" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('lebar_mulut', $item->ukuran->lebar_mulut) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tinggi_mulut" id="tinggi_mulut" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tinggi_mulut', $item->ukuran->tinggi_mulut) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tebal_mulut" id="tebal_mulut" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tebal_mulut', $item->ukuran->tebal_mulut) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="diameter_mulut" id="diameter_mulut" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('diameter_mulut', $item->ukuran->diameter_mulut) }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">Tinggi Keseluruhan</th>
                                    <td colspan="4">
                                        <input type="number" name="tinggi_keseluruhan" id="tinggi_keseluruhan" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tinggi_keseluruhan', $item->ukuran->tinggi_keseluruhan) }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mata</th>
                                    <td>
                                        <input type="number" name="panjang_mata" id="panjang_mata" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('panjang_mata', $item->ukuran->panjang_mata) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="lebar_mata" id="lebar_mata" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('lebar_mata', $item->ukuran->lebar_mata) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tinggi_mata" id="tinggi_mata" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tinggi_mata', $item->ukuran->tinggi_mata) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tebal_mata" id="tebal_mata" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tebal_mata', $item->ukuran->tebal_mata) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="diameter_mata" id="diameter_mata" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('diameter_mata', $item->ukuran->diameter_mata) }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tangkai</th>
                                    <td>
                                        <input type="number" name="panjang_tangkai" id="panjang_tangkai" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('panjang_tangkai', $item->ukuran->panjang_tangkai) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="lebar_tangkai" id="lebar_tangkai" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('lebar_tangkai', $item->ukuran->lebar_tangkai) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tinggi_tangkai" id="tinggi_tangkai" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tinggi_tangkai', $item->ukuran->tinggi_tangkai) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tebal_tangkai" id="tebal_tangkai" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tebal_tangkai', $item->ukuran->tebal_tangkai) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="diameter_tangkai" id="diameter_tangkai" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('diameter_tangkai', $item->ukuran->diameter_tangkai) }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sarung</th>
                                    <td>
                                        <input type="number" name="panjang_sarung" id="panjang_sarung" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('panjang_sarung', $item->ukuran->panjang_sarung) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="lebar_sarung" id="lebar_sarung" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('lebar_sarung', $item->ukuran->lebar_sarung) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tinggi_sarung" id="tinggi_sarung" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tinggi_sarung', $item->ukuran->tinggi_sarung) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="tebal_sarung" id="tebal_sarung" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('tebal_sarung', $item->ukuran->tebal_sarung) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="diameter_sarung" id="diameter_sarung" class="form-control" placeholder="CM" step="0.001" min="0" value="{{ old('diameter_sarung', $item->ukuran->diameter_sarung) }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="1">Panjang Keseluruhan</th>
                                    <td colspan="2">
                                        <input type="number" name="panjang_keseluruhan" id="panjang_keseluruhan" class="form-control" placeholder="CM" step="0.001" min="0" value={{ old('panjang_keseluruhan', $item->panjang_keseluruhan) }}>
                                    </td>
                                    <th colspan="1">Berat</th>
                                    <td colspan="2">
                                        <input type="number" name="berat" id="berat" class="form-control" placeholder="GRAM" step="0.001" min="0" value={{ old('berat', $item->berat) }}>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Koleksi</label>
                        <button type="button" class="btn btn-info btn-sm ml-1" data-toggle="modal" data-target="#modal_foto">
                            Lihat Foto
                        </button>
                        <input type="file" class="form-control mt-1 @error('foto') is-invalid @enderror" id="foto" name="foto[]" placeholder="Masukkan Foto Koleksi" value="{{ old('foto') }}" multiple="multiple" onchange="preview_image();">
                        @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div id="image_preview" class="mt-3"></div>
                    </div>
                    <div class="form-group">
                        <label for="link_video">Link Video</label>
                        <input type="text" class="form-control @error('link_video') is-invalid @enderror" id="link_video" name="link_video" placeholder="Masukkan Link Video" value="{{ old('link_video', $item->link_video) }}" multiple="multiple" onchange="preview_image();">
                        @error('link_video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div id="image_preview" class="mt-3"></div>
                    </div>
                    <div class="modal fade" id="modal_foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Foto Koleksi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($item->foto as $item3)
                                        <img src="{{ asset('storage/images/gambar-koleksi/' . $item3->foto) }}" alt="" style="width: 100%">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('addon-style')
    <link href="{{ url('backend/assets/modules/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" >
        <link href="{{ url('backend/assets/modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ url('css/sweetalert2.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('backend/assets/modules/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('backend/assets/modules/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#klasifikasi').select2();
            $('#sub_klasifikasi').select2();
            $('#tanggal_masuk').datepicker({
                format: 'yyyy/mm/dd',
                todayBtn: 'linked',
                todayHighlight: true,
                autoclose: true,
            });
            $('#tanggal_pencatatan').datepicker({
                format: 'yyyy/mm/dd',
                todayBtn: 'linked',
                todayHighlight: true,
                autoclose: true,
            });
            $('#tanggal_masuk, #tanggal_pencatatan').keypress(function(e) {
                e.preventDefault();
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            var value = $('#value_sub_klasifikasi').val()
            $.ajax({
                url: `{{ route('data-sub-kategori.add') }}`,
                type: 'get',
                data: {
                    'klasifikasi' : $('#klasifikasi').val()
                },
                dataType: 'json',
                success: function (response) {
                    if (response != null) {
                        $('select[name="sub_klasifikasi"]').empty();
                        $('#sub_klasifikasi').append(new Option("-- Pilih Sub Klasifikasi --", ""))
                        $.each(response, function (kode, nama) {
                            $('#sub_klasifikasi').append(new Option(nama, kode))
                        });
                        $('#sub_klasifikasi').val(value).change()
                    }
                }
            });
        });
        $("#klasifikasi").on("change", function() {
            $.ajax({
                url: `{{ route('data-sub-kategori.add') }}`,
                type: 'get',
                data: {
                    'klasifikasi' : $(this).val()
                },
                dataType: 'json',
                success: function (response) {
                    if (response != null) {
                        $('select[name="sub_klasifikasi"]').empty();
                        $('#sub_klasifikasi').append(new Option("-- Pilih Sub Klasifikasi --", ""))
                        $.each(response, function (kode, nama) {
                            $('#sub_klasifikasi').append(new Option(nama, kode))
                        });
                    }
                }
            });
        });
    </script>
    <script>
        function preview_image() {
            var total_file=document.getElementById("foto").files.length;
            $('#image_preview').html("");
            for(var i=0;i<total_file;i++) {
                $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' style='width: 800px;'><br>");
            }
        }
    </script>
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
    @if(session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session()->get("error") }}'
            })
        </script>
    @endif
@endpush
