<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $items = Tanggapan::where('status', '1')->get();
        $items2 = Kategori::all();

        return view('pages.home.home')->with(compact('items', 'items2'));
    }

    public function scan()
    {
        return view('pages.home.scan');
    }

    public function about()
    {
        return view('pages.home.about_us');
    }

    public function send_testimony(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'no_telepon' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'pesan' => ['required', 'string', 'max:255'],
        ]);

        Tanggapan::create([
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('home')->with('success', 'Terimakasih Sudah Memberi Testimoni');
    }

    public function koleksi($kode)
    {
        $item = Koleksi::where('kode_unik', $kode)->first();

        return view('pages.home.koleksi', [
            'item' => $item
        ]);
    }

    public function scanning(Request $request)
    {
        $item = Koleksi::where('kode_unik', $request->qr_code)->first();

        if ($item) {
            return response()->json(['hasil' => 'ada', 'route' => route('scanning-qr-code.show', $request->qr_code)]);
        }else {
            return response()->json(['hasil' => 'tidak']);
        }
    }
}
