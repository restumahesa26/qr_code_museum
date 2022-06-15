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
            $table->float('panjang_ukuran', 5,3)->nullable();
            $table->float('lebar_ukuran', 5,3)->nullable();
            $table->float('tinggi_ukuran', 5,3)->nullable();
            $table->float('tebal_ukuran', 5,3)->nullable();
            $table->float('diameter_ukuran', 5,3)->nullable();
            $table->float('panjang_badan', 5,3)->nullable();
            $table->float('lebar_badan', 5,3)->nullable();
            $table->float('tinggi_badan', 5,3)->nullable();
            $table->float('tebal_badan', 5,3)->nullable();
            $table->float('diameter_badan', 5,3)->nullable();
            $table->float('panjang_alas', 5,3)->nullable();
            $table->float('lebar_alas', 5,3)->nullable();
            $table->float('tinggi_alas', 5,3)->nullable();
            $table->float('tebal_alas', 5,3)->nullable();
            $table->float('diameter_alas', 5,3)->nullable();
            $table->float('panjang_mulut', 5,3)->nullable();
            $table->float('lebar_mulut', 5,3)->nullable();
            $table->float('tinggi_mulut', 5,3)->nullable();
            $table->float('tebal_mulut', 5,3)->nullable();
            $table->float('diameter_mulut', 5,3)->nullable();
            $table->float('tinggi_keseluruhan', 5,3)->nullable();
            $table->float('panjang_mata', 5,3)->nullable();
            $table->float('lebar_mata', 5,3)->nullable();
            $table->float('tinggi_mata', 5,3)->nullable();
            $table->float('tebal_mata', 5,3)->nullable();
            $table->float('diameter_mata', 5,3)->nullable();
            $table->float('panjang_tangkai', 5,3)->nullable();
            $table->float('lebar_tangkai', 5,3)->nullable();
            $table->float('tinggi_tangkai', 5,3)->nullable();
            $table->float('tebal_tangkai', 5,3)->nullable();
            $table->float('diameter_tangkai', 5,3)->nullable();
            $table->float('panjang_sarung', 5,3)->nullable();
            $table->float('lebar_sarung', 5,3)->nullable();
            $table->float('tinggi_sarung', 5,3)->nullable();
            $table->float('tebal_sarung', 5,3)->nullable();
            $table->float('diameter_sarung', 5,3)->nullable();
            $table->float('panjang_keseluruhan', 5,3)->nullable();
            $table->float('berat', 5,3)->nullable();
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
