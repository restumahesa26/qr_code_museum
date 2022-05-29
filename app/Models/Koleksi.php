<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_inventaris', 'nama_koleksi', 'nomor_koleksi_lama_registrasi', 'nomor_koleksi_lama_inventaris', 'klasifikasi', 'nomor_penyimpanan', 'tanggal_masuk', 'cara_perolehan', 'tempat_perolehan', 'kondisi_koleksi', 'ciri_khusus', 'bahan', 'warna', 'motif', 'dekorasi', 'teknik_pembuatan', 'tempat_pembuatan', 'fungsi', 'tempat_penyimpanan', 'tanggal_pencatatan', 'keterangan', 'judul_naskah', 'ukuran_naskah', 'jumlah_halaman', 'jumlah_baris', 'iluminasi', 'sub_klasifikasi', 'kode_unik', 'link_video'
    ];

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'kode', 'klasifikasi');
    }

    public function ukuran()
    {
        return $this->hasOne(Ukuran::class, 'koleksi_id', 'id');
    }


    public function foto()
    {
        return $this->hasMany(FotoKoleksi::class, 'koleksi_id', 'id');
    }
}
