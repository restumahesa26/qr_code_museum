<?php

namespace App\Http\Controllers;

use App\Models\FotoKoleksi;
use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\SubKategori;
use App\Models\Ukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Koleksi::latest('updated_at')->get();

        return view('pages.koleksi.index', [
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
        $kategori = Kategori::orderBy('kode', 'ASC')->get();
        $subKategori = SubKategori::orderBy('kode', 'ASC')->get();

        return view('pages.koleksi.create', [
            'kategori' => $kategori, 'subKategori' => $subKategori
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
            'nomor_inventaris' => ['required', 'numeric'],
            'nama_koleksi' => ['required', 'string', 'max:255'],
            // 'nomor_koleksi_lama_registrasi' => ['required', 'numeric'],
            // 'nomor_koleksi_lama_inventaris' => ['required', 'numeric'],
            'klasifikasi' => ['required'],
            'nomor_penyimpanan' => ['required', 'string'],
            'cara_perolehan' => ['required', 'string', 'max:255'],
            'kondisi_koleksi' => ['required', 'string', 'max:255'],
            // 'ciri_khusus' => ['required', 'string', 'max:255'],
            // 'bahan' => ['required', 'string', 'max:255'],
            // 'warna' => ['required', 'string', 'max:255'],
            // 'motif' => ['required', 'string', 'max:255'],
            // 'dekorasi' => ['required', 'string', 'max:255'],
            'teknik_pembuatan' => ['required', 'string', 'max:255'],
            // 'tempat_pembuatan' => ['required', 'string', 'max:255'],
            // 'fungsi' => ['required', 'string', 'max:255'],
            'tempat_penyimpanan' => ['required', 'string', 'max:255'],
            // 'keterangan' => ['required', 'string', 'max:255'],
            // 'judul_naskah' => ['required', 'string', 'max:255'],
            // 'ukuran_naskah' => ['required', 'numeric'],
            // 'jumlah_halaman' => ['required', 'numeric'],
            // 'jumlah_baris' => ['required', 'numeric'],
            // 'iluminasi' => ['required', 'string', 'max:255'],
            // 'jumlah_baris' => ['required', 'numeric'],
            'panjang_ukuran' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_ukuran' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_ukuran' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_ukuran' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_ukuran' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_badan' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_badan' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_badan' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_badan' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_badan' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_alas' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_alas' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_alas' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_alas' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_alas' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_mulut' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_mulut' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_mulut' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_mulut' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_mulut' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_keseluruhan' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_mata' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_mata' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_mata' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_mata' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_mata' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_tangkai' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_tangkai' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_tangkai' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_tangkai' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_tangkai' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_sarung' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_sarung' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_sarung' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_sarung' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_sarung' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_keseluruhan' => ['max:9999.999', 'nullable', 'numeric'],
            'berat' => ['max:9999.999', 'nullable', 'numeric'],
            // 'foto' => ['required', 'image', 'mimes:jpeg,png,jpg'],
        ]);

        $foto = array();

        foreach ($request->file('foto') as $value) {
            $extension = $value->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/images/gambar-koleksi', $value, $imageNames);
            $thumbnailpath = storage_path('app/public/images/gambar-koleksi/' . $imageNames);
            Image::make($thumbnailpath)->resize(700, 550)->save($thumbnailpath);
            $foto[] = $imageNames;
        }

        $check = Koleksi::where('nomor_inventaris', $request->nomor_inventaris)->get();

        if ($request->sub_klasifikasi) {
            $nomorBaru = $request->klasifikasi . '.' . $request->sub_klasifikasi . '.' . $request->nomor_inventaris;
        } else {
            $nomorBaru = $request->klasifikasi . '.' . $request->nomor_inventaris;
        }

        $nomorInventaris = array();

        foreach ($check as $value) {
            $kategori = $value->klasifikasi;
            if ($value->sub_klasifikasi) {
                $nomor = $kategori . '.' . $value->sub_klasifikasi . '.' . $value->nomor_inventaris;
            }else {
                $nomor = $kategori . '.' . $value->nomor_inventaris;
            }
            $nomorInventaris[] = $nomor;
        }

        if (in_array($nomorBaru, $nomorInventaris)) {
            return redirect()->back()->with('error', 'Nomor Inventaris Sudah Tersedia')->withInput();
        } else {
            $koleksi = Koleksi::create([
                'nomor_inventaris' => $request->nomor_inventaris,
                'nama_koleksi' => $request->nama_koleksi,
                'nomor_seri' => $request->nomor_seri,
                'nomor_koleksi_lama_registrasi' => $request->nomor_koleksi_lama_registrasi,
                'nomor_koleksi_lama_inventaris' => $request->nomor_koleksi_lama_inventaris,
                'klasifikasi' => $request->klasifikasi,
                'sub_klasifikasi' => $request->sub_klasifikasi,
                'nomor_penyimpanan' => $request->nomor_penyimpanan,
                'tanggal_masuk' => $request->tanggal_masuk,
                'cara_perolehan' => $request->cara_perolehan,
                'tempat_perolehan' => $request->tempat_perolehan,
                'kondisi_koleksi' => $request->kondisi_koleksi,
                'ciri_khusus' => $request->ciri_khusus,
                'bahan' => $request->bahan,
                'warna' => $request->warna,
                'motif' => $request->motif,
                'dekorasi' => $request->dekorasi,
                'teknik_pembuatan' => $request->teknik_pembuatan,
                'tempat_pembuatan' => $request->tempat_pembuatan,
                'fungsi' => $request->fungsi,
                'tempat_penyimpanan' => $request->tempat_penyimpanan,
                'tanggal_pencatatan' => $request->tanggal_pencatatan,
                'keterangan' => $request->keterangan,
                'judul_naskah' => $request->judul_naskah,
                'ukuran_naskah' => $request->ukuran_naskah,
                'jumlah_halaman' => $request->jumlah_halaman,
                'jumlah_baris' => $request->jumlah_baris,
                'iluminasi' => $request->iluminasi,
                'link_video' => $request->link_video,
                'kode_unik' => uniqid($request->nomor_inventaris, microtime())
            ]);

            Ukuran::create([
                'koleksi_id' => $koleksi->id,
                'panjang_ukuran' => $request->panjang_ukuran,
                'lebar_ukuran' => $request->lebar_ukuran,
                'tinggi_ukuran' => $request->tinggi_ukuran,
                'tebal_ukuran' => $request->tebal_ukuran,
                'diameter_ukuran' => $request->diameter_ukuran,
                'panjang_badan' => $request->panjang_badan,
                'lebar_badan' => $request->lebar_badan,
                'tinggi_badan' => $request->tinggi_badan,
                'tebal_badan' => $request->tebal_badan,
                'diameter_badan' => $request->diameter_badan,
                'panjang_alas' => $request->panjang_alas,
                'lebar_alas' => $request->lebar_alas,
                'tinggi_alas' => $request->tinggi_alas,
                'tebal_alas' => $request->tebal_alas,
                'diameter_alas' => $request->diameter_alas,
                'panjang_mulut' => $request->panjang_mulut,
                'lebar_mulut' => $request->lebar_mulut,
                'tinggi_mulut' => $request->tinggi_mulut,
                'tebal_mulut' => $request->tebal_mulut,
                'diameter_mulut' => $request->diameter_mulut,
                'tinggi_keseluruhan' => $request->tinggi_keseluruhan,
                'panjang_mata' => $request->panjang_mata,
                'lebar_mata' => $request->lebar_mata,
                'tinggi_mata' => $request->tinggi_mata,
                'tebal_mata' => $request->tebal_mata,
                'diameter_mata' => $request->diameter_mata,
                'panjang_tangkai' => $request->panjang_tangkai,
                'lebar_tangkai' => $request->lebar_tangkai,
                'tinggi_tangkai' => $request->tinggi_tangkai,
                'tebal_tangkai' => $request->tebal_tangkai,
                'diameter_tangkai' => $request->diameter_tangkai,
                'panjang_sarung' => $request->panjang_sarung,
                'lebar_sarung' => $request->lebar_sarung,
                'tinggi_sarung' => $request->tinggi_sarung,
                'tebal_sarung' => $request->tebal_sarung,
                'diameter_sarung' => $request->diameter_sarung,
                'panjang_keseluruhan' => $request->panjang_keseluruhan,
                'berat' => $request->berat,
            ]);

            foreach ($foto as $value) {
                FotoKoleksi::create([
                    'koleksi_id' => $koleksi->id,
                    'foto' => $value
                ]);
            }

            return redirect()->route('data-koleksi.index')->with('success', 'Berhasil Menambah Koleksi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Koleksi::findOrFail($id);
        $kategori = Kategori::orderBy('kode', 'ASC')->get();
        $subKategori = SubKategori::orderBy('kode', 'ASC')->get();

        return view('pages.koleksi.edit', [
            'item' => $item, 'kategori' => $kategori, 'subKategori' => $subKategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_inventaris' => ['required', 'numeric'],
            'nama_koleksi' => ['required', 'string', 'max:255'],
            // 'nomor_koleksi_lama_registrasi' => ['required', 'numeric'],
            // 'nomor_koleksi_lama_inventaris' => ['required', 'numeric'],
            'klasifikasi' => ['required'],
            'nomor_penyimpanan' => ['required', 'string'],
            'cara_perolehan' => ['required', 'string', 'max:255'],
            'kondisi_koleksi' => ['required', 'string', 'max:255'],
            // 'ciri_khusus' => ['required', 'string', 'max:255'],
            // 'bahan' => ['required', 'string', 'max:255'],
            // 'warna' => ['required', 'string', 'max:255'],
            // 'motif' => ['required', 'string', 'max:255'],
            // 'dekorasi' => ['required', 'string', 'max:255'],
            'teknik_pembuatan' => ['required', 'string', 'max:255'],
            // 'tempat_pembuatan' => ['required', 'string', 'max:255'],
            // 'fungsi' => ['required', 'string', 'max:255'],
            'tempat_penyimpanan' => ['required', 'string', 'max:255'],
            // 'keterangan' => ['required', 'string', 'max:255'],
            // 'judul_naskah' => ['required', 'string', 'max:255'],
            // 'ukuran_naskah' => ['required', 'numeric'],
            // 'jumlah_halaman' => ['required', 'numeric'],
            // 'jumlah_baris' => ['required', 'numeric'],
            // 'iluminasi' => ['required', 'string', 'max:255'],
            // 'jumlah_baris' => ['required', 'numeric'],
            'panjang_ukuran' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_ukuran' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_ukuran' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_ukuran' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_ukuran' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_badan' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_badan' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_badan' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_badan' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_badan' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_alas' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_alas' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_alas' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_alas' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_alas' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_mulut' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_mulut' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_mulut' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_mulut' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_mulut' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_keseluruhan' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_mata' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_mata' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_mata' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_mata' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_mata' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_tangkai' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_tangkai' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_tangkai' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_tangkai' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_tangkai' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_sarung' => ['max:9999.999', 'nullable', 'numeric'],
            'lebar_sarung' => ['max:9999.999', 'nullable', 'numeric'],
            'tinggi_sarung' => ['max:9999.999', 'nullable', 'numeric'],
            'tebal_sarung' => ['max:9999.999', 'nullable', 'numeric'],
            'diameter_sarung' => ['max:9999.999', 'nullable', 'numeric'],
            'panjang_keseluruhan' => ['max:9999.999', 'nullable', 'numeric'],
            'berat' => ['max:9999.999', 'nullable', 'numeric'],
            // 'foto' => ['required', 'image', 'mimes:jpeg,png,jpg'],
        ]);

        $foto = array();

        if ($request->file('foto')) {
            foreach ($request->file('foto') as $value) {
                $extension = $value->extension();
                $imageNames = uniqid('img_', microtime()) . '.' . $extension;
                Storage::putFileAs('public/images/gambar-koleksi', $value, $imageNames);
                $thumbnailpath = storage_path('app/public/images/gambar-koleksi/' . $imageNames);
                Image::make($thumbnailpath)->resize(700, 550)->save($thumbnailpath);
                $foto[] = $imageNames;
            }
        }

        $check = Koleksi::where('nomor_inventaris', $request->nomor_inventaris)->get();

        if ($request->sub_klasifikasi) {
            $nomorBaru = $request->klasifikasi . '.' . $request->sub_klasifikasi . '.' . $request->nomor_inventaris;
        } else {
            $nomorBaru = $request->klasifikasi . '.' . $request->nomor_inventaris;
        }

        $nomorInventaris = array();

        foreach ($check as $value) {
            $kategori = $value->klasifikasi;
            if ($value->sub_klasifikasi) {
                $nomor = $kategori . '.' . $value->sub_klasifikasi . '.' . $value->nomor_inventaris;
            }else {
                $nomor = $kategori . '.' . $value->nomor_inventaris;
            }
            $nomorInventaris[] = $nomor;
        }

        $item = Koleksi::findOrFail($id);

        if ($item->sub_klasifikasi != NULL) {
            $nomorSekarang = $item->klasifikasi . '.' . $item->sub_klasifikasi . '.' . $item->nomor_inventaris;
        }else {
            $nomorSekarang = $item->klasifikasi . '.' . $item->nomor_inventaris;
        }

        if ($nomorSekarang == $nomorBaru) {
            $item->update([
                'nomor_inventaris' => $request->nomor_inventaris,
                'nama_koleksi' => $request->nama_koleksi,
                'nomor_seri' => $request->nomor_seri,
                'nomor_koleksi_lama_registrasi' => $request->nomor_koleksi_lama_registrasi,
                'nomor_koleksi_lama_inventaris' => $request->nomor_koleksi_lama_inventaris,
                'klasifikasi' => $request->klasifikasi,
                'sub_klasifikasi' => $request->sub_klasifikasi,
                'nomor_penyimpanan' => $request->nomor_penyimpanan,
                'tanggal_masuk' => $request->tanggal_masuk,
                'cara_perolehan' => $request->cara_perolehan,
                'tempat_perolehan' => $request->tempat_perolehan,
                'kondisi_koleksi' => $request->kondisi_koleksi,
                'ciri_khusus' => $request->ciri_khusus,
                'bahan' => $request->bahan,
                'warna' => $request->warna,
                'motif' => $request->motif,
                'dekorasi' => $request->dekorasi,
                'teknik_pembuatan' => $request->teknik_pembuatan,
                'tempat_pembuatan' => $request->tempat_pembuatan,
                'fungsi' => $request->fungsi,
                'tempat_penyimpanan' => $request->tempat_penyimpanan,
                'tanggal_pencatatan' => $request->tanggal_pencatatan,
                'keterangan' => $request->keterangan,
                'judul_naskah' => $request->judul_naskah,
                'ukuran_naskah' => $request->ukuran_naskah,
                'jumlah_halaman' => $request->jumlah_halaman,
                'jumlah_baris' => $request->jumlah_baris,
                'iluminasi' => $request->iluminasi,
                'link_video' => $request->link_video,
            ]);

            $item2 = Ukuran::where('koleksi_id', $id)->first();

            $item2->update([
                'panjang_ukuran' => $request->panjang_ukuran,
                'lebar_ukuran' => $request->lebar_ukuran,
                'tinggi_ukuran' => $request->tinggi_ukuran,
                'tebal_ukuran' => $request->tebal_ukuran,
                'diameter_ukuran' => $request->diameter_ukuran,
                'panjang_badan' => $request->panjang_badan,
                'lebar_badan' => $request->lebar_badan,
                'tinggi_badan' => $request->tinggi_badan,
                'tebal_badan' => $request->tebal_badan,
                'diameter_badan' => $request->diameter_badan,
                'panjang_alas' => $request->panjang_alas,
                'lebar_alas' => $request->lebar_alas,
                'tinggi_alas' => $request->tinggi_alas,
                'tebal_alas' => $request->tebal_alas,
                'diameter_alas' => $request->diameter_alas,
                'panjang_mulut' => $request->panjang_mulut,
                'lebar_mulut' => $request->lebar_mulut,
                'tinggi_mulut' => $request->tinggi_mulut,
                'tebal_mulut' => $request->tebal_mulut,
                'diameter_mulut' => $request->diameter_mulut,
                'tinggi_keseluruhan' => $request->tinggi_keseluruhan,
                'panjang_mata' => $request->panjang_mata,
                'lebar_mata' => $request->lebar_mata,
                'tinggi_mata' => $request->tinggi_mata,
                'tebal_mata' => $request->tebal_mata,
                'diameter_mata' => $request->diameter_mata,
                'panjang_tangkai' => $request->panjang_tangkai,
                'lebar_tangkai' => $request->lebar_tangkai,
                'tinggi_tangkai' => $request->tinggi_tangkai,
                'tebal_tangkai' => $request->tebal_tangkai,
                'diameter_tangkai' => $request->diameter_tangkai,
                'panjang_sarung' => $request->panjang_sarung,
                'lebar_sarung' => $request->lebar_sarung,
                'tinggi_sarung' => $request->tinggi_sarung,
                'tebal_sarung' => $request->tebal_sarung,
                'diameter_sarung' => $request->diameter_sarung,
                'panjang_keseluruhan' => $request->panjang_keseluruhan,
                'berat' => $request->berat,
            ]);

            if ($request->file('foto')) {
                $foto2 = FotoKoleksi::where('koleksi_id', $id)->get();

                foreach ($foto2 as $value) {
                    $filename  = ('public/images/gambar-koleksi/').$value->foto;
                    Storage::delete($filename);
                }

                FotoKoleksi::where('koleksi_id', $id)->delete();

                foreach ($foto as $value) {
                    FotoKoleksi::create([
                        'koleksi_id' => $id,
                        'foto' => $value
                    ]);
                }
            }

            return redirect()->route('data-koleksi.index')->with('success', 'Berhasil Mengubah Koleksi');
        } else {
            if (in_array($nomorBaru, $nomorInventaris)) {
                return redirect()->back()->with('error', 'Nomor Inventaris Sudah Tersedia')->withInput();
            } else {
                $item->update([
                    'nomor_inventaris' => $request->nomor_inventaris,
                    'nama_koleksi' => $request->nama_koleksi,
                    'nomor_seri' => $request->nomor_seri,
                    'nomor_koleksi_lama_registrasi' => $request->nomor_koleksi_lama_registrasi,
                    'nomor_koleksi_lama_inventaris' => $request->nomor_koleksi_lama_inventaris,
                    'klasifikasi' => $request->klasifikasi,
                    'sub_klasifikasi' => $request->sub_klasifikasi,
                    'nomor_penyimpanan' => $request->nomor_penyimpanan,
                    'tanggal_masuk' => $request->tanggal_masuk,
                    'cara_perolehan' => $request->cara_perolehan,
                    'tempat_perolehan' => $request->tempat_perolehan,
                    'kondisi_koleksi' => $request->kondisi_koleksi,
                    'ciri_khusus' => $request->ciri_khusus,
                    'bahan' => $request->bahan,
                    'warna' => $request->warna,
                    'motif' => $request->motif,
                    'dekorasi' => $request->dekorasi,
                    'teknik_pembuatan' => $request->teknik_pembuatan,
                    'tempat_pembuatan' => $request->tempat_pembuatan,
                    'fungsi' => $request->fungsi,
                    'tempat_penyimpanan' => $request->tempat_penyimpanan,
                    'tanggal_pencatatan' => $request->tanggal_pencatatan,
                    'keterangan' => $request->keterangan,
                    'judul_naskah' => $request->judul_naskah,
                    'ukuran_naskah' => $request->ukuran_naskah,
                    'jumlah_halaman' => $request->jumlah_halaman,
                    'jumlah_baris' => $request->jumlah_baris,
                    'iluminasi' => $request->iluminasi,
                    'link_video' => $request->link_video,
                ]);

                $item2 = Ukuran::where('koleksi_id', $id)->first();

                $item2->update([
                    'panjang_ukuran' => $request->panjang_ukuran,
                    'lebar_ukuran' => $request->lebar_ukuran,
                    'tinggi_ukuran' => $request->tinggi_ukuran,
                    'tebal_ukuran' => $request->tebal_ukuran,
                    'diameter_ukuran' => $request->diameter_ukuran,
                    'panjang_badan' => $request->panjang_badan,
                    'lebar_badan' => $request->lebar_badan,
                    'tinggi_badan' => $request->tinggi_badan,
                    'tebal_badan' => $request->tebal_badan,
                    'diameter_badan' => $request->diameter_badan,
                    'panjang_alas' => $request->panjang_alas,
                    'lebar_alas' => $request->lebar_alas,
                    'tinggi_alas' => $request->tinggi_alas,
                    'tebal_alas' => $request->tebal_alas,
                    'diameter_alas' => $request->diameter_alas,
                    'panjang_mulut' => $request->panjang_mulut,
                    'lebar_mulut' => $request->lebar_mulut,
                    'tinggi_mulut' => $request->tinggi_mulut,
                    'tebal_mulut' => $request->tebal_mulut,
                    'diameter_mulut' => $request->diameter_mulut,
                    'tinggi_keseluruhan' => $request->tinggi_keseluruhan,
                    'panjang_mata' => $request->panjang_mata,
                    'lebar_mata' => $request->lebar_mata,
                    'tinggi_mata' => $request->tinggi_mata,
                    'tebal_mata' => $request->tebal_mata,
                    'diameter_mata' => $request->diameter_mata,
                    'panjang_tangkai' => $request->panjang_tangkai,
                    'lebar_tangkai' => $request->lebar_tangkai,
                    'tinggi_tangkai' => $request->tinggi_tangkai,
                    'tebal_tangkai' => $request->tebal_tangkai,
                    'diameter_tangkai' => $request->diameter_tangkai,
                    'panjang_sarung' => $request->panjang_sarung,
                    'lebar_sarung' => $request->lebar_sarung,
                    'tinggi_sarung' => $request->tinggi_sarung,
                    'tebal_sarung' => $request->tebal_sarung,
                    'diameter_sarung' => $request->diameter_sarung,
                    'panjang_keseluruhan' => $request->panjang_keseluruhan,
                ]);

                if ($request->file('foto')) {
                    $foto2 = FotoKoleksi::where('koleksi_id', $id)->get();

                    foreach ($foto2 as $value) {
                        $filename  = ('public/images/gambar-koleksi/').$value->foto;
                        Storage::delete($filename);
                    }

                    FotoKoleksi::where('koleksi_id', $id)->delete();

                    foreach ($foto as $value) {
                        FotoKoleksi::create([
                            'koleksi_id' => $id,
                            'foto' => $value
                        ]);
                    }
                }

                return redirect()->route('data-koleksi.index')->with('success', 'Berhasil Mengubah Koleksi');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Koleksi::findOrFail($id);

        $foto = FotoKoleksi::where('koleksi_id', $id)->get();

        foreach ($foto as $value) {
            $filename  = ('public/images/gambar-koleksi/').$value->foto;
            Storage::delete($filename);
        }

        $item->delete();

        return redirect()->route('data-koleksi.index')->with('success', 'Berhasil Menghapus Koleksi');
    }

    public function generate_qr_code($id)
    {
        $item = Koleksi::findOrFail($id);

        return view('pages.pdf.qr_code', [
            'item' => $item
        ]);
    }
}
