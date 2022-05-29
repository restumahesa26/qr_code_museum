@extends('layouts.home')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Koleksi</h6>
            <h1 class="mb-5">{{ $item->nama_koleksi }} - {{ $item->kategori->nama }}</h1>
        </div>
        <div class="row g-4 justify-content-start">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td style="width: 15%">Nomor Inventaris</td>
                        <td style="width: 1%;">:</td>
                        <td style="width: 84%">{{ $item->klasifikasi }}.{{ $item->nomor_inventaris }}</td>
                    </tr>
                    <tr>
                        <td>Nama Koleksi</td>
                        <td>:</td>
                        <td>{{ $item->nama_koleksi }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Koleksi Lama</td>
                        <td>:</td>
                        <td>Reg : {{ $item->nomor_koleksi_lama_registrasi }} &emsp;&emsp;&emsp; Inven :
                            {{ $item->nomor_koleksi_lama_inventaris }}</td>
                    </tr>
                    <tr>
                        <td>Klasifikasi</td>
                        <td>:</td>
                        <td>{{ $item->kategori->nama }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Penyimpanan Koleksi</td>
                        <td>:</td>
                        <td>{{ $item->klasifikasi }}.{{ $item->nomor_inventaris }}
                            {{ $item->sub_klasifikasi != NULL ? '.' . $item->sub_klasifikasi : '' }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Masuk</td>
                        <td>:</td>
                        <td>{{ App\Helpers\MyHelper::formatTanggal($item->tanggal_masuk) }}</td>
                    </tr>
                    <tr>
                        <td>Cara Perolehan</td>
                        <td>:</td>
                        <td>{{ $item->cara_perolehan }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Perolehan</td>
                        <td>:</td>
                        <td>{{ $item->tempat_perolehan }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Pembuatan</td>
                        <td>:</td>
                        <td>{{ $item->tempat_pembuatan }}</td>
                    </tr>
                    <tr>
                        <td>Kondisi Koleksi</td>
                        <td>:</td>
                        <td>{{ $item->kondisi_koleksi }}</td>
                    </tr>
                    <tr>
                        <td>Ciri Khusus</td>
                        <td>:</td>
                        <td>{{ $item->ciri_khusus != NULL ?  $item->ciri_khusus : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Bahan</td>
                        <td>:</td>
                        <td>{{ $item->bahan != NULL ?  $item->bahan : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Warna</td>
                        <td>:</td>
                        <td>{{ $item->warna != NULL ?  $item->warna : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Motif</td>
                        <td>:</td>
                        <td>{{ $item->motif != NULL ?  $item->motif : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Perolehan</td>
                        <td>:</td>
                        <td>{{ $item->tempat_perolehan != NULL ?  $item->tempat_perolehan : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Dekorasi</td>
                        <td>:</td>
                        <td>{{ $item->dekorasi != NULL ?  $item->dekorasi : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Ukuran</td>
                        <td>:</td>
                        <td>
                            <div style="overflow-x:auto;">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr class="text-center">
                                            <th>Item</th>
                                            <th>Panjang</th>
                                            <th>Lebar</th>
                                            <th>Tinggi</th>
                                            <th>Tebal</th>
                                            <th>Diameter</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Ukuran</th>
                                            <td>{{ $item->ukuran->panjang_ukuran != NULL ?  $item->ukuran->panjang_ukuran : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->lebar_ukuran != NULL ?  $item->ukuran->lebar_ukuran : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tinggi_ukuran != NULL ?  $item->ukuran->tinggi_ukuran : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tebal_ukuran != NULL ?  $item->ukuran->tebal_ukuran : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->diameter_ukuran != NULL ?  $item->ukuran->diameter_ukuran : '-' }}
                                            </td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Badan</th>
                                            <td>{{ $item->ukuran->panjang_badan != NULL ?  $item->ukuran->panjang_badan : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->lebar_badan != NULL ?  $item->ukuran->lebar_badan : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tinggi_badan != NULL ?  $item->ukuran->tinggi_badan : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tebal_badan != NULL ?  $item->ukuran->tebal_badan : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->diameter_badan != NULL ?  $item->ukuran->diameter_badan : '-' }}
                                            </td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Alas</th>
                                            <td>{{ $item->ukuran->panjang_alas != NULL ?
                                            $item->ukuran->panjang_alas : '-' }}</td>
                                            <td>{{ $item->ukuran->lebar_alas != NULL ?  $item->ukuran->lebar_alas : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tinggi_alas != NULL ?  $item->ukuran->tinggi_alas : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tebal_alas != NULL ?  $item->ukuran->tebal_alas : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->diameter_alas != NULL ?  $item->ukuran->diameter_alas : '-' }}
                                            </td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Mulut</th>
                                            <td>{{ $item->ukuran->panjang_mulut != NULL ?  $item->ukuran->panjang_mulut : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->lebar_mulut != NULL ?  $item->ukuran->lebar_mulut : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tinggi_mulut != NULL ?  $item->ukuran->tinggi_mulut : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tebal_mulut != NULL ?  $item->ukuran->tebal_mulut : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->diameter_mulut != NULL ?  $item->ukuran->diameter_mulut : '-' }}
                                            </td>
                                        </tr>
                                        <tr class="text-left">
                                            <th colspan="6">Tinggi Keseluruhan :
                                                {{ $item->ukuran->tinggi_keseluruhan != NULL ?  $item->ukuran->tinggi_keseluruhan : '-' }}
                                                cm</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Mata</th>
                                            <td>{{ $item->ukuran->panjang_mata != NULL ?  $item->ukuran->panjang_mata : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->lebar_mata != NULL ?  $item->ukuran->lebar_mata : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tinggi_mata != NULL ?  $item->ukuran->tinggi_mata : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tebal_mata != NULL ?  $item->ukuran->tebal_mata : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->diameter_mata != NULL ?  $item->ukuran->diameter_mata : '-' }}
                                            </td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Tangkai</th>
                                            <td>{{ $item->ukuran->panjang_tangkai != NULL ?  $item->ukuran->panjang_tangkai : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->lebar_tangkai != NULL ?  $item->ukuran->lebar_tangkai : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tinggi_tangkai != NULL ?  $item->ukuran->tinggi_tangkai : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tebal_tangkai != NULL ?  $item->ukuran->tebal_tangkai : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->diameter_tangkai != NULL ?  $item->ukuran->diameter_tangkai : '-' }}
                                            </td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Sarung</th>
                                            <td>{{ $item->ukuran->panjang_sarung != NULL ?  $item->ukuran->panjang_sarung : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->lebar_sarung != NULL ?  $item->ukuran->lebar_sarung : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tinggi_sarung != NULL ?  $item->ukuran->tinggi_sarung : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->tebal_sarung != NULL ?  $item->ukuran->tebal_sarung : '-' }}
                                            </td>
                                            <td>{{ $item->ukuran->diameter_sarung != NULL ?  $item->ukuran->diameter_sarung : '-' }}
                                            </td>
                                        </tr>
                                        <tr class="text-left">
                                            <th colspan="6">Panjang Keseluruhan :
                                                {{ $item->ukuran->panjang_keseluruhan != NULL ?  $item->ukuran->panjang_keseluruhan : '-' }}
                                                cm</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Teknik Pembuatan</td>
                        <td>:</td>
                        <td>{{ $item->teknik_pembuatan != NULL ?  $item->teknik_pembuatan : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Pembuatan</td>
                        <td>:</td>
                        <td>{{ $item->tempat_pembuatan != NULL ?  $item->tempat_pembuatan : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Fungsi</td>
                        <td>:</td>
                        <td>{{ $item->fungsi != NULL ?  $item->fungsi : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Penyimpanan</td>
                        <td>:</td>
                        <td>{{ $item->tempat_penyimpanan != NULL ?  $item->tempat_penyimpanan : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pencatatan</td>
                        <td>:</td>
                        <td>{{ $item->tanggal_pencatatan != NULL ?  App\Helpers\MyHelper::formatTanggal($item->tanggal_pencatatan) : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>{{ $item->keterangan != NULL ?  $item->keterangan : '-' }}</td>
                    </tr>
                    @if ($item->judul_naskah != NULL)
                    <tr>
                        <td>Judul Naskah</td>
                        <td>:</td>
                        <td>{{ $item->judul_naskah != NULL ?  $item->judul_naskah : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Ukuran Naskah</td>
                        <td>:</td>
                        <td>{{ $item->ukuran_naskah != NULL ?  $item->ukuran_naskah : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Halaman</td>
                        <td>:</td>
                        <td>{{ $item->jumlah_halaman != NULL ?  $item->jumlah_halaman : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Baris</td>
                        <td>:</td>
                        <td>{{ $item->jumlah_baris != NULL ?  $item->jumlah_baris : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Iluminasi</td>
                        <td>:</td>
                        <td>{{ $item->iluminasi != NULL ?  $item->iluminasi : '-' }}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            @foreach ($item->foto as $foto)
                <img src="{{ asset('storage/images/gambar-koleksi/' . $foto->foto) }}" alt="" style="width: 100%">
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('addon-style')
<style>
    .table-borderless tbody tr td {
        font-size: 18px;
        font-weight: bold;
        padding: 4px !important;
    }
</style>
@endpush
