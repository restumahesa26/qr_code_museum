<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kategori::orderBy('kode', 'ASC')->get();

        return view('pages.kategori.index', [
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
        return view('pages.kategori.create');
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
            'kode' => ['required', 'string', 'max:255', 'unique:kategoris'],
            'nama' => ['required', 'string', 'max:255'],
        ]);

        Kategori::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect()->route('data-kategori.index')->with('success', 'Berhasil Menambah Kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Kategori::findOrFail($id);

        return view('pages.kategori.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Kategori::findOrFail($id);

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
        ]);

        if ($item->kode != $request->kode) {
            $request->validate([
                'kode' => ['required', 'string', 'max:255', 'unique:kategoris'],
            ]);
        }

        $item->kode = $request->kode;
        $item->nama = $request->nama;
        $item->save();

        return redirect()->route('data-kategori.index')->with('success', 'Berhasil Mengubah Kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kategori::findOrFail($id);

        $item->delete();

        return redirect()->route('data-kategori.index')->with('success', 'Berhasil Menghapus Kategori');
    }
}
