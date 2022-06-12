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
            $table->string('nomor_inventaris');
            $table->string('nama_koleksi');
            $table->string('nomor_seri')->nullable();
            $table->string('nomor_koleksi_lama_registrasi')->nullable();
            $table->string('nomor_koleksi_lama_inventaris')->nullable();
            $table->string('klasifikasi');
            $table->foreign('klasifikasi')->references('kode')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->string('sub_klasifikasi')->nullable();
            $table->foreign('sub_klasifikasi')->references('kode')->on('sub_kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nomor_penyimpanan');
            $table->date('tanggal_masuk')->nullable();
            $table->string('cara_perolehan')->nullable();
            $table->string('tempat_perolehan')->nullable();
            $table->string('kondisi_koleksi')->nullable();
            $table->string('ciri_khusus')->nullable();
            $table->string('bahan')->nullable();
            $table->string('warna')->nullable();
            $table->string('motif')->nullable();
            $table->string('dekorasi')->nullable();
            $table->string('teknik_pembuatan')->nullable();
            $table->string('tempat_pembuatan')->nullable();
            $table->string('fungsi')->nullable();
            $table->string('tempat_penyimpanan')->nullable();
            $table->date('tanggal_pencatatan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('judul_naskah')->nullable();
            $table->float('ukuran_naskah')->nullable();
            $table->string('jumlah_halaman')->nullable();
            $table->integer('jumlah_baris')->nullable();
            $table->string('iluminasi')->nullable();
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
