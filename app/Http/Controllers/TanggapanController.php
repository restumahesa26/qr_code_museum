<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Tanggapan::latest('updated_at')->get();

        return view('pages.tanggapan.index', [
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Tanggapan::findOrFail($id);

        $item->update([
            'status' => '0'
        ]);

        return redirect()->route('data-tanggapan.index')->with('success', 'Berhasil Set Non Aktif Tanggapan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Tanggapan::findOrFail($id);

        $item->update([
            'status' => '1'
        ]);

        return redirect()->route('data-tanggapan.index')->with('success', 'Berhasil Set Aktif Tanggapan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Tanggapan::findOrFail($id);

        $item->delete();

        return redirect()->route('data-tanggapan.index')->with('success', 'Berhasil Menghapus Tanggapan');
    }
}
