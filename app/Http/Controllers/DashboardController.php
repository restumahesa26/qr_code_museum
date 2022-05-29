<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\SubKategori;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $kategori = Kategori::count();
        $sub_kategori = SubKategori::count();
        $koleksi = Koleksi::count();
        $tanggapan = Tanggapan::count();

        $allKategori = Kategori::all();

        return view('pages.dashboard')->with(compact('kategori', 'sub_kategori', 'koleksi', 'tanggapan', 'allKategori'));
    }
}
