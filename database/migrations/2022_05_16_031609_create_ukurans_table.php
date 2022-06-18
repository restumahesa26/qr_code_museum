<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUkuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukurans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('koleksi_id')->references('id')->on('koleksis')->onDelete('cascade')->onUpdate('cascade');
            $table->float('panjang_ukuran', 7,3)->nullable();
            $table->float('lebar_ukuran', 7,3)->nullable();
            $table->float('tinggi_ukuran', 7,3)->nullable();
            $table->float('tebal_ukuran', 7,3)->nullable();
            $table->float('diameter_ukuran', 7,3)->nullable();
            $table->float('panjang_badan', 7,3)->nullable();
            $table->float('lebar_badan', 7,3)->nullable();
            $table->float('tinggi_badan', 7,3)->nullable();
            $table->float('tebal_badan', 7,3)->nullable();
            $table->float('diameter_badan', 7,3)->nullable();
            $table->float('panjang_alas', 7,3)->nullable();
            $table->float('lebar_alas', 7,3)->nullable();
            $table->float('tinggi_alas', 7,3)->nullable();
            $table->float('tebal_alas', 7,3)->nullable();
            $table->float('diameter_alas', 7,3)->nullable();
            $table->float('panjang_mulut', 7,3)->nullable();
            $table->float('lebar_mulut', 7,3)->nullable();
            $table->float('tinggi_mulut', 7,3)->nullable();
            $table->float('tebal_mulut', 7,3)->nullable();
            $table->float('diameter_mulut', 7,3)->nullable();
            $table->float('tinggi_keseluruhan', 7,3)->nullable();
            $table->float('panjang_mata', 7,3)->nullable();
            $table->float('lebar_mata', 7,3)->nullable();
            $table->float('tinggi_mata', 7,3)->nullable();
            $table->float('tebal_mata', 7,3)->nullable();
            $table->float('diameter_mata', 7,3)->nullable();
            $table->float('panjang_tangkai', 7,3)->nullable();
            $table->float('lebar_tangkai', 7,3)->nullable();
            $table->float('tinggi_tangkai', 7,3)->nullable();
            $table->float('tebal_tangkai', 7,3)->nullable();
            $table->float('diameter_tangkai', 7,3)->nullable();
            $table->float('panjang_sarung', 7,3)->nullable();
            $table->float('lebar_sarung', 7,3)->nullable();
            $table->float('tinggi_sarung', 7,3)->nullable();
            $table->float('tebal_sarung', 7,3)->nullable();
            $table->float('diameter_sarung', 7,3)->nullable();
            $table->float('panjang_keseluruhan', 7,3)->nullable();
            $table->float('berat', 7,3)->nullable();
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
        Schema::dropIfExists('ukurans');
    }
}
