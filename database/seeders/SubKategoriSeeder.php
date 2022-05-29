<?php

namespace Database\Seeders;

use App\Models\SubKategori;
use Illuminate\Database\Seeder;

class SubKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubKategori::create([
            'kode' => '01',
            'kategori_kode' => '03',
            'nama' => 'Senjata'
        ]);

        SubKategori::create([
            'kode' => '02',
            'kategori_kode' => '03',
            'nama' => 'Kuningan'
        ]);

        SubKategori::create([
            'kode' => '03',
            'kategori_kode' => '03',
            'nama' => 'Anyaman'
        ]);

        SubKategori::create([
            'kode' => '04',
            'kategori_kode' => '03',
            'nama' => 'Tenun'
        ]);
    }
}
