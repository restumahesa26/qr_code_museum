<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    use HasFactory;

    protected $fillable = [
        'koleksi_id', 'panjang_ukuran', 'lebar_ukuran', 'tinggi_ukuran', 'tebal_ukuran', 'diameter_ukuran', 'panjang_badan', 'lebar_badan', 'tinggi_badan', 'tebal_badan', 'diameter_badan', 'panjang_alas', 'lebar_alas', 'tinggi_alas', 'tebal_alas', 'diameter_alas', 'panjang_mulut', 'lebar_mulut', 'tinggi_mulut', 'tebal_mulut', 'diameter_mulut', 'tinggi_keseluruhan', 'panjang_mata', 'lebar_mata', 'tinggi_mata', 'tebal_mata', 'diameter_mata', 'panjang_tangkai', 'lebar_tangkai', 'tinggi_tangkai', 'tebal_tangkai', 'diameter_tangkai', 'panjang_sarung', 'lebar_sarung', 'tinggi_sarung', 'tebal_sarung', 'diameter_sarung', 'panjang_keseluruhan', 'berat'
    ];
}
