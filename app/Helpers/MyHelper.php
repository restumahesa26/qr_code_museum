<?php

namespace App\Helpers;

use App\Models\Koleksi;
use Carbon\Carbon;

class MyHelper
{
    public function getKategoriCount($id)
    {
        $item = Koleksi::where('klasifikasi', $id)->count();

        return $item;
    }

    public function formatTanggal($date)
    {
        $dateFormat = Carbon::parse($date)->translatedFormat('l, d F Y');

        return $dateFormat;
    }
}


