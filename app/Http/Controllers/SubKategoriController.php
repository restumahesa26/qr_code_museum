<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = SubKategori::orderBy('kode', 'ASC')->get();

        return view('pages.sub-kategori.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Kategori::all();

        return view('pages.sub-kategori.create', [
            'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => ['required', 'string', 'max:255', 'unique:sub_kategoris'],
            'nama' => ['required', 'string', 'max:255', 'unique:sub_kategoris'],
            'kategori_kode' => ['required', 'string', 'max:255'],
        ]);

        SubKategori::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kategori_kode' => $request->kategori_kode,
        ]);

        return redirect()->route('data-sub-kategori.index')->with('success', 'Berhasil Menambah Sub Kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = SubKategori::findOrFail($id);
        $items = Kategori::all();

        return view('pages.sub-kategori.edit', [
            'item' => $item, 'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = SubKategori::findOrFail($id);

        $request->validate([
            'kategori_kode' => ['required', 'string', 'max:255'],
        ]);

        if ($item->kode !== $request->kode) {
            $request->validate([
                'kode' => ['required', 'string', 'max:255', 'unique:sub_kategoris'],
            ]);
        }

        if ($item->nama != $request->nama) {
            $request->validate([
                'nama' => ['required', 'string', 'max:255', 'unique:sub_kategoris'],
            ]);
        }

        $item->kode = $request->kode;
        $item->kategori_kode = $request->kategori_kode;
        $item->nama = $request->nama;
        $item->save();

        return redirect()->route('data-sub-kategori.index')->with('success', 'Berhasil Mengubah Sub Kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SubKategori::findOrFail($id);

        $item->delete();

        return redirect()->route('data-sub-kategori.index')->with('success', 'Berhasil Menghapus Sub Kategori');
    }

    public function subKategori(Request $request)
    {
        $kategori_id = $request->klasifikasi;

        $data = SubKategori::where('kategori_kode', $kategori_id)->pluck('nama', 'kode');

        return response()->json($data);
    }
}
