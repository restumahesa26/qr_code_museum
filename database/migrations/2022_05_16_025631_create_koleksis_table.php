<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoleksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koleksis', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_inventaris', 8);
            $table->string('nama_koleksi', 50);
            $table->string('nomor_seri', 12)->nullable();
            $table->string('nomor_koleksi_lama_registrasi', 12)->nullable();
            $table->string('nomor_koleksi_lama_inventaris', 12)->nullable();
            $table->string('klasifikasi', 8);
            $table->foreign('klasifikasi')->references('kode')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->string('sub_klasifikasi', 8)->nullable();
            $table->foreign('sub_klasifikasi')->references('kode')->on('sub_kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nomor_penyimpanan', 12);
            $table->date('tanggal_masuk')->nullable();
            $table->string('cara_perolehan', 30)->nullable();
            $table->string('tempat_perolehan', 50)->nullable();
            $table->string('kondisi_koleksi', 20)->nullable();
            $table->string('ciri_khusus', 50)->nullable();
            $table->string('bahan', 20)->nullable();
            $table->string('warna', 30)->nullable();
            $table->string('motif', 35)->nullable();
            $table->string('dekorasi', 30)->nullable();
            $table->string('teknik_pembuatan', 30)->nullable();
            $table->string('tempat_pembuatan', 30)->nullable();
            $table->string('fungsi', 30)->nullable();
            $table->string('tempat_penyimpanan', 25)->nullable();
            $table->date('tanggal_pencatatan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('judul_naskah', 50)->nullable();
            $table->string('ukuran_naskah', 35)->nullable();
            $table->string('jumlah_halaman', 20)->nullable();
            $table->string('jumlah_baris', 35)->nullable();
            $table->string('iluminasi', 30)->nullable();
            $table->string('kode_unik');
            $table->string('link_video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koleksis');
    }
}
